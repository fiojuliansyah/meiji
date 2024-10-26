<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Career;
use App\Models\Profile;
use App\Models\Departement;
use App\Models\Document;
use App\Models\Level;
use App\Models\Location;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GuestController extends Controller
{

    public function index()
    {
      
        return view('welcome');
    }


    public function jobList()
    {
        $careers = Career::all();
        $departements = Departement::withCount('careers')->get();
        $locations = Location::all();
        $levels = Level::withCount('careers')->get();
        $types = Type::withCount('careers')->get();
        $totalCareers = Career::count();
        $minSalary = Career::min('salary');
        $maxSalary = Career::max('salary');
        // Mengambil nilai unik dan menghitung jumlah masing-masing placement
        $placements = Career::select('placement')
            ->groupBy('placement')
            ->selectRaw('count(*) as count') // Menghitung jumlah untuk setiap placement
            ->get();
        return view('jobList', compact('careers', 'departements', 'locations', 'levels', 'types', 'totalCareers', 'minSalary', 'maxSalary', 'placements'));
    }

    public function jobDetail($id)
    {
        $career = Career::find($id);
        if (!$career) {
            return redirect()->back();
        }

        $otherCareers = Career::where('id', '<>', $id)
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $latlong = $career->location->latlong;
        $latlongArray = explode(',', $latlong);
        $latitude = $latlongArray[0];
        $longitude = $latlongArray[1];

        $address = $this->getAddressFromLatLong($latitude, $longitude);
        return view('jobDetail', compact('career', 'latitude', 'longitude', 'address', 'otherCareers'));
    }


    public function getAddressFromLatLong($latitude, $longitude)
    {
        $url = "https://nominatim.openstreetmap.org/reverse?format=json&lat={$latitude}&lon={$longitude}&addressdetails=1";

        $response = Http::get($url);
        $data = $response->json();

        if (isset($data['address'])) {
            return $data['display_name'];
        }

        return "Address not found";
    }


    public function applyCareer(Request $request)
    {
        try {
            // Validate the request


            // Check if the user already exists
            $existingUser = User::where('email', $request->email)
                ->orWhere('phone', $request->phone)
                ->first();

            if (!$existingUser) {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email|unique:users,email',
                    'phone' => 'required|string',
                    'document' => 'required|file|max:2048',
                    'career_id' => 'required|integer'
                ]);
                // Create new user
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'password' => Hash::make('12345678'),
                ]);

                $user->syncRoles('User');

                // Upload file to Cloudinary
                $file = $request->file('document');
                $uploadedFile = $file->storeOnCloudinary('documents/' . $user->name);
                Profile::create([
                    'user_id' => $user->id,
                ]);
                // Save document information
                Document::create([
                    'type' => "CV",
                    'name' => 'CV_' . $user->name,
                    'document_url' => $uploadedFile->getSecurePath(),
                    'document_public_id' => $uploadedFile->getPublicId(),
                    'user_id' => $user->id,
                ]);
            } else {
                $request->validate([
                    'career_id' => 'required|integer'
                ]);
                $existingApplicant = Applicant::where('user_id', $existingUser->id)
                    ->where('career_id', $request->career_id)
                    ->first();

                if ($existingApplicant) {
                    return redirect()->back()->with('error', 'You have already applied for this career.');
                }

                // Save applicant data
                Applicant::create([
                    'user_id' => $existingUser->id,
                    'career_id' => $request->career_id,
                    'status' => "waiting",
                ]);
            }

            return redirect()->back()->with('success', 'Application submitted successfully!');
        } catch (\Illuminate\Validation\ValidationException $ve) {
            return redirect()->back()->with('error', 'Validation failed: ' . implode(', ', $ve->validator->errors()->all()));
        } catch (\Exception $e) {
            Log::error('Application submission error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to submit application. Please try again later.');
        }

    }


    
}
