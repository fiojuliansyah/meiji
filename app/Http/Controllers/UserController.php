<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::whereDoesntHave('roles', function ($query) {
        //     $query->where('name', 'Super Admin');
        // })->get();
        $users = User::all();

        // $roles = Role::where('name', '!=', 'Super Admin')->get();
        $roles = Role::all();
        $documents = Document::all();

        return view('user', compact('users', 'roles', 'documents'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8',
                'role' => 'required',
            ]);

            $user = new User();
            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];
            $user->password = Hash::make($validatedData['password']);

            $user->save();

            $user->syncRoles($validatedData['role']);

            return redirect()->back()->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to create user: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // Cari user berdasarkan ID, jika tidak ditemukan maka lempar 404
            $user = User::findOrFail($id);

            // Validasi data umum
            $validatedData = $request->validate([
                'name' => 'required|string|max:100',
                'email' => ['required', 'email', 'max:125', Rule::unique('users')->ignore($id)],
                'phone' => 'required|max:13',
            ]);

            // Update name, email, dan phone menggunakan fill() dan Eloquent save
            $user->fill($validatedData);

            // Hanya admin yang bisa mengubah role
            if (Auth::user()->is_admin) {
                $roleData = $request->validate([
                    'role' => 'required|exists:roles,name', // Validasi role harus ada di database
                ]);


                // Sinkronisasi role baru
                $user->syncRoles($roleData['role']);
            }

            // Simpan perubahan user
            $user->save();

            return redirect()->back()->with('success', 'User updated successfully!');
        } catch (ModelNotFoundException $e) {
            return redirect()->back()->with('error', 'User not found.');
        } catch (ValidationException $e) {
            // Ambil semua pesan error dan gabungkan menjadi satu string
            $errorMessage = implode(', ', $e->validator->errors()->all());
            return redirect()->back()->with('error', 'Validation failed: ' . $errorMessage)->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update user: ' . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);

            $user->syncRoles([]);

            $user->delete();

            return redirect()->back()->with('success', 'User deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete user: ' . $e->getMessage());
        }
    }

    public function bulkDelete(Request $request)
    {
        try {
            $ids = $request->user_ids;

            $users = User::whereIn('id', $ids)->get();

            foreach ($users as $user) {
                $user->syncRoles([]);
                $user->delete();
            }

            return redirect()->back()->with('success', 'Users Deleted successfully.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete users: ' . $e->getMessage());
        }
    }

    public function viewProfile($id)
    {
        $user = User::findOrFail($id);
        $user = User::with(['profile', 'documents'])->findOrFail($id);
        $roles = Role::all();

        return view('viewprofile', [
            'user' => $user,
            'profile' => $user->profile,
            'documents' => $user->documents,
            'roles' => $roles,
        ]);
    }


    public function myProfile()
    {
        $id = Auth::user()->id;
        $user = User::with(['profile', 'documents'])->findOrFail($id);
        $roles = Role::all();

        return view('viewprofile', [
            'user' => $user,
            'profile' => $user->profile,
            'documents' => $user->documents,
            'roles' => $roles,
        ]);
    }

    public function resetPassword(Request $request, $id)
    {
        try {
            // Cari user berdasarkan ID, jika tidak ditemukan maka lempar 404
            $user = User::findOrFail($id);

            // Validasi data umum
            $validatedData = $request->validate([
                'reset_password' => 'required|min:8|max:100',
            ]);


            // Update password user
            $user->password = Hash::make($validatedData['reset_password']);
            $user->save();

            return redirect()->back()->with('success', 'Password berhasil direset!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mereset password: ' . $e->getMessage());
        }
    }
}
