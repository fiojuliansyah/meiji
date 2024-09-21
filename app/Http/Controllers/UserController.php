<?php

namespace App\Http\Controllers;

use App\Models\User;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'Super Admin');
        })->get();
 
        $roles = Role::where('name', '!=', 'Super Admin')->get();


        return view('user', compact('users', 'roles'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:8|confirmed',
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
            $user = User::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($id)],
                'role' => 'required',
                'avatar' => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
            ]);

            $user->name = $validatedData['name'];
            $user->email = $validatedData['email'];


            $user->syncRoles($validatedData['role']);

            // Handle avatar upload
            if ($request->hasFile('avatar')) {
                $file = $request->file('avatar');

                if ($user->avatar) {
                    $publicId = pathinfo($user->avatar, PATHINFO_FILENAME);
                    Cloudinary::destroy("avatar/{$publicId}");
                }

                $publicId = $user->name . '_' . now()->format('Ymd_His');
                $uploadedFile = Cloudinary::upload($file->getRealPath(), [
                    'folder' => 'avatar',
                    'public_id' => $publicId,
                    'overwrite' => true,
                ])->getSecurePath();

                if ($uploadedFile) {


                    $user->avatar = $uploadedFile;
                } else {
                    return redirect()->back()->with('error', 'Failed Upload Avatar.');
                }
            } else {
                if ($user->avatar) {
                    $publicId = pathinfo($user->avatar, PATHINFO_FILENAME);
               
                    Cloudinary::destroy("avatar/{$publicId}");
                }
                $user->avatar = null;
            }

            $user->save();
            return redirect()->back()->with('success', 'User updated successfully!');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to update user: ' . $e->getMessage());
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

            return redirect()
                ->back()
                ->with('success', "Users Deleted successfully.");
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('error', 'Failed to delete users: ' . $e->getMessage());
        }
    }

    public function changeAvatar( $request){

    }
}
