<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Departement;
use App\Models\Level;
use App\Models\Location;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GuestController extends Controller
{
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


    
}
