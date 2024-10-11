<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
      
        $permissions = Permission::all()->groupBy('category');

        return view('role', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required|unique:roles',
                'permissions' => 'required|array',
            ]);

            $role = Role::create(['name' => $validatedData['name']]);
            $role->syncPermissions($validatedData['permissions']);

            return redirect()->back()->with('success', 'Role and permissions added successfully!');

        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Failed to add role: ' . $e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $role = Role::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required|unique:roles,name,' . $role->id,
                'permissions' => 'required|array',
            ]);

            $role->update(['name' => $validatedData['name']]);
            $role->syncPermissions($validatedData['permissions']);

            return redirect()->back()->with('success', 'Role and permissions updated successfully!');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update role: ' . $e->getMessage());
        }
    }
}
