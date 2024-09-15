<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(){
       
        $roles = Role::all();
    
        $permissions = Permission::all()->groupBy('category');
        // $roleListPermission= $roles->

        return view('role', compact('roles', 'permissions'));
    }


    // Menyimpan role baru
    public function store(Request $request)
    {
        // Validasi nama role dan permissions
        $validatedData = $request->validate([
            'name' => 'required|unique:roles',
            'permissions' => 'required|array',
        ]);
  

        // Membuat role baru
        $role = Role::create(['name' => $validatedData['name']]);

        // Menyimpan permissions ke role
        $role->syncPermissions($validatedData['permissions']);

        return redirect()->back()->with('success', 'Role berhasil dibuat.');
    }

    // Mengupdate role yang ada
    public function update(Request $request, $id)
    {
      
        // Validasi nama role dan permissions
        $role = Role::findOrFail($id);
        
        $validatedData = $request->validate([
            'name' => 'required|unique:roles,name,' . $role->id,
            'permissions' => 'required|array',
        ]);

        // Update nama role
        $role->update(['name' => $validatedData['name']]);

        // Update permissions untuk role
        $role->syncPermissions($validatedData['permissions']);

        return redirect()->back()->with('success', 'Role berhasil diupdate.');
    }
}
