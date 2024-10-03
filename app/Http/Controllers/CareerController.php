<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Departement;
use App\Models\Level;
use App\Models\Location;
use App\Models\Type;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::all();
        $departements = Departement::all();
        $levels = Level::all();
        $types = Type::all();
        $locations = Location::all();
        return view('career', compact('careers', 'departements', 'levels', 'types', 'locations'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'career_id' => 'required',
                'departement' => 'required', // Mengambil ID dari tabel departments
                'location' => 'required',       // Mengambil ID dari tabel locations
                'type' => 'required',               // Mengambil ID dari tabel types
                'level' => 'required',             // Mengambil ID dari tabel levels
                'salary' => 'numeric',
                'placement' => 'string|max:50',
                'description' => 'required|string',
                'experience' => 'string',
                'deadline_date' => 'date',
            ]);


            // Buat objek baru untuk menyimpan data pekerjaan
            $career = new Career();
            $career->name = $validatedData['name'];
            $career->user_id = $validatedData['user_id'];
            $career->departement_id = $validatedData['departement'];  // Menyimpan ID department
            $career->location_id = $validatedData['location'];        // Menyimpan ID location
            $career->type_id = $validatedData['type'];                // Menyimpan ID type
            $career->level_id = $validatedData['level'];              // Menyimpan ID level
            $career->salary = $validatedData['salary'];
            $career->placement = $validatedData['placement'];
            $career->description = $validatedData['description'];
            $career->experience = $validatedData['experience'];
            $career->deadline_date = $validatedData['deadline_date'];

            // Simpan data pekerjaan ke database
            $career->save();

            return redirect()->back()->with('success', 'Carreer created successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to create Carreer: ' . $e->getMessage());
        }
    }


    public function update(Request $request, $id)
    {
        try {
            // Cari pekerjaan berdasarkan ID, jika tidak ditemukan maka lempar 404
            $career = Career::findOrFail($id);

            // Validasi data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'departement_id' => 'required',  // Mengambil ID dari tabel departments
                'location_id' => 'required',       // Mengambil ID dari tabel locations
                'type_id' => 'required',               // Mengambil ID dari tabel types
                'level_id' => 'required',             // Mengambil ID dari tabel levels
                'salary' => 'required|numeric',
                'placement' => 'required|string|max:50',
                'description' => 'required|string',
                'experience' => 'string',
                'deadline_date' => 'date',
            ]);

            // Update data pekerjaan menggunakan fill() dan simpan perubahan
            $career->fill($validatedData);
            $career->save();

            return redirect()->back()->with('success', 'Career updated successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'Career not found.');
        } catch (ValidationException $e) {
            $errorMessage = implode(', ', $e->validator->errors()->all());
            return redirect()->back()->with('error', 'Validation failed: ' . $errorMessage)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update Career: ' . $e->getMessage());
        }
    }



    public function destroy($id)
    {
        try {
            $career = Career::findOrFail($id);


            $career->delete();

            return redirect()->back()->with('success', 'Career deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete Career: ' . $e->getMessage());
        }
    }


    public function bulkDelete(Request $request)
    {

        try {
            $ids = $request->career_ids;

            $careers = Career::whereIn('id', $ids)->get();

            foreach ($careers as $career) {
                $career->delete();
            }

            return redirect()->back()->with('success', 'Careers Deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete Careers: ' . $e->getMessage());
        }
    }
}
