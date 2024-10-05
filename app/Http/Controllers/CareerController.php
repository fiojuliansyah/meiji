<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Departement;
use App\Models\Level;
use App\Models\Location;
use App\Models\Type;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
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





//----- CRUD DEPARTEMENT ------
    public function departement()
    {
        $departements = Departement::all();

        return view('departement', compact('departements'));
    }

    public function dptStore(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'img' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            ]);
            $departement = new Departement();
            $departement->name = $validatedData['name'];
            $departement->slug = $validatedData['name'];
            // Upload file ke Cloudinary dan ambil URL & Public ID
            $file = $request->file('img');
            $uploadedFile = $file->storeOnCloudinary('departements'); // Folder 'documents'

            // Simpan URL dan Public ID
            $fileUrl = $uploadedFile->getSecurePath();
            $filePublicId = $uploadedFile->getPublicId();

            // Contoh penyimpanan data dokumen ke database (jika ada model terkait):
            $departement->img_url = $fileUrl;
            $departement->img_public_id = $filePublicId;

            $departement->save();

            // Berhasil upload dan simpan
            return redirect()->back()->with('success', 'Departement uploaded successfully!');
        } catch (\Exception $e) {
            // Tangkap error saat upload
            return redirect()
                ->back()
                ->with('error', 'Failed to upload departement. Error: ' . $e->getMessage());
        }
    }

    public function dptUpdate(Request $request, $id)
    {
        try {
            $departement = Departement::findorfail($id);
            $validatedData = $request->validate([
                'name' => 'required|string',
                'img' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            ]);

            if (!$departement) {
                return redirect()->back()->with('error', 'Departement not found.');
            }
            $departement->name = $validatedData['name'];
            $departement->slug = $validatedData['name'];
            // Hapus file di Cloudinary
            if ($departement->img_public_id) {
                Cloudinary::destroy($departement->img_public_id);
            }
            // Upload file ke Cloudinary dan ambil URL & Public ID
            $file = $request->file('img');
            if ($file) {
                $uploadedFile = $file->storeOnCloudinary('departements'); // Folder 'documents'

                // Simpan URL dan Public ID
                $fileUrl = $uploadedFile->getSecurePath();
                $filePublicId = $uploadedFile->getPublicId();

                // Contoh penyimpanan data dokumen ke database (jika ada model terkait):
                $departement->img_url = $fileUrl;
                $departement->img_public_id = $filePublicId;
            }

            $departement->save();

            // Berhasil upload dan simpan
            return redirect()->back()->with('success', 'Departement updated successfully!');
        } catch (\Exception $e) {
            // Tangkap error saat upload
            return redirect()
                ->back()
                ->with('error', 'Failed to update departement. Error: ' . $e->getMessage());
        }
    }

    public function dptDelete(Request $request, $id)
    {

        try {
            $departement = Departement::findOrFail($id);

            // Hapus file di Cloudinary
            if ($departement->img_public_id) {
                Cloudinary::destroy($departement->img_public_id);
            }

            $departement->delete();

            return redirect()->back()->with('success', 'Departement deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete departement: ' . $e->getMessage());
        }
    }


    public function dptBulkDelete(Request $request)
    {
        try {
            $ids = $request->departement_ids;

            $careers = Departement::whereIn('id', $ids)->get();

            foreach ($careers as $career) {
                // Hapus file di Cloudinary
                if ($career->img_public_id) {
                    Cloudinary::destroy($career->img_public_id);
                }
                $career->delete();
            }

            return redirect()->back()->with('success', 'Departements Deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete Departements: ' . $e->getMessage());
        }
    }


//----- END CRUD DEPARTEMENT ------

    



//----- CRUD LOCATION ------
    public function location()
    {
        $locations = Location::all();

        return view('location', compact('locations'));
    }

    public function loctStore(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|unique:locations,name,',
                'latitude' => 'nullable',
                'longitude' => 'nullable',
            ]);
            $location = new Location();
            $location->name = $validatedData['name'];
            $location->slug = $validatedData['name'];
            $location->latlong = $validatedData['latitude'] . ',' . $validatedData['longitude'];


            $location->save();

            return redirect()->back()->with('success', 'Location uploaded successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to upload Location. Error: ' . $e->getMessage());
        }
    }

    public function loctUpdate(Request $request, $id)
    {
        $location = Location::findorfail($id);
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|unique:locations,name,' . $id . ',id',
                'latitude' => 'nullable',
                'longitude' => 'nullable',
            ]);

            if (!$location) {
                return redirect()->back()->with('error', 'location not found.');
            }
            $location->name = $validatedData['name'];
            $location->slug = $validatedData['name'];
            $location->latlong = $validatedData['latitude'] . ',' . $validatedData['longitude'];


            $location->save();

            return redirect()->back()->with('success', 'Location updated successfully!');
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with('error', 'Failed to update Location. Error: ' . $e->getMessage());
        }
    }

    public function loctDelete($id)
    {

        try {
            $location = Location::findOrFail($id);
            $location->delete();

            return redirect()->back()->with('success', 'Location deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete Location: ' . $e->getMessage());
        }
    }


    public function loctBulkDelete(Request $request)
    {
        try {
            $ids = $request->location_ids;

            $careers = Location::whereIn('id', $ids)->get();

            foreach ($careers as $career) {
                $career->delete();
            }

            return redirect()->back()->with('success', 'Locations Deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete Locations: ' . $e->getMessage());
        }
    }
//----- END CRUD LOCATION ------






//----- CRUD CRUD LEVEL ------
    public function level()
    {
        $levels = Level::all();


        return view('level', compact('levels'));
    }

    public function lvlStore(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|unique:levels,name,',
            ]);
            $level = new Level();
            $level->name = $validatedData['name'];


            $level->save();

            return redirect()->back()->with('success', 'Level uploaded successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to upload Level. Error: ' . $e->getMessage());
        }
    }

    public function lvlUpdate(Request $request, $id)
    {
        $level = Level::findorfail($id);
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|unique:levels,name,' . $id . ',id',
                'latitude' => 'nullable',
                'longitude' => 'nullable',
            ]);

            if (!$level) {
                return redirect()->back()->with('error', 'level not found.');
            }
            $level->name = $validatedData['name'];


            $level->save();

            return redirect()->back()->with('success', 'Level updated successfully!');
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with('error', 'Failed to update Level. Error: ' . $e->getMessage());
        }
    }

    public function lvlDelete($id)
    {

        try {
            $level = Level::findOrFail($id);
            $level->delete();

            return redirect()->back()->with('success', 'Level deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete Level: ' . $e->getMessage());
        }
    }


    public function lvlBulkDelete(Request $request)
    {
        try {
            $ids = $request->level_ids;

            $levels = Level::whereIn('id', $ids)->get();

            foreach ($levels as $level) {

                $level->delete();
            }

            return redirect()->back()->with('success', 'Levels Deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete Levels: ' . $e->getMessage());
        }
    }
//----- END CRUD LEVEL ------








//----- CRUD TYPE ------
    public function type()
    {
        $types = Type::all();

        return view('type', compact('types'));
    }

    public function typeStore(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|unique:types,name,',
            ]);
            $type = new Type();
            $type->name = $validatedData['name'];


            $type->save();

            return redirect()->back()->with('success', 'Type uploaded successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to upload Type. Error: ' . $e->getMessage());
        }
    }

    public function typeUpdate(Request $request, $id)
    {
        $type = Type::findorfail($id);
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|unique:types,name,' . $id . ',id',
            ]);

            if (!$type) {
                return redirect()->back()->with('error', 'Type not found.');
            }
            $type->name = $validatedData['name'];


            $type->save();

            return redirect()->back()->with('success', 'Type updated successfully!');
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with('error', 'Failed to update Type. Error: ' . $e->getMessage());
        }
    }

    public function typeDelete($id)
    {

        try {
            $type = Type::findOrFail($id);
            $type->delete();

            return redirect()->back()->with('success', 'type deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete type: ' . $e->getMessage());
        }
    }


    public function typeBulkDelete(Request $request)
    {
        try {
            $ids = $request->type_ids;

            $types = Type::whereIn('id', $ids)->get();

            foreach ($types as $type) {

                $type->delete();
            }

            return redirect()->back()->with('success', 'types Deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete types: ' . $e->getMessage());
        }
    }
//----- END CRUD TYPE ------



}
