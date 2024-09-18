<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
   // Define permissions array
        $permissions = [
            [
                'name' => 'role-list',
                'mock' => 'list',
                'category' => 'role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'role-create',
                'mock' => 'create',
                'category' => 'role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'role-update',
                'mock' => 'update',
                'category' => 'role',
                'guard_name' => 'web',
            ],
            [
                'name' => 'role-delete',
                'mock' => 'delete',
                'category' => 'role',
                'guard_name' => 'web',
            ],
        ];

        // Create permissions
        foreach ($permissions as $permission) {
            Permission::create($permission);
        }

        // Define roles array
        $roles = [
            [
                'name' => 'Super Admin',
                'guard_name' => 'web',
            ],
            [
                'name' => 'User',
                'guard_name' => 'web',
            ],
        ];

        // Create roles
        $superAdminRole = Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);
        $userRole = Role::create(['name' => 'User', 'guard_name' => 'web']);

        // Sync permissions to Super Admin role
        $superAdminRole->syncPermissions(Permission::all()); // Berikan semua permissions ke Super Admin

        // Optionally, you can give specific permissions to User role
        $userRole->syncPermissions(['role-list']); // Berikan permission 'role-list' ke User role

        // Create a Super Admin user
        $adminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),  // Use secure password here
            'remember_token' => Str::random(10),
        ]);

        // Create a regular User
        $normalUser = User::create([
            'name' => 'Normal User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),  // Use secure password here
            'remember_token' => Str::random(10),
        ]);

        // Assign Super Admin role to the admin user
        $adminUser->syncRoles('Super Admin');

        // Assign User role to the normal user
        $normalUser->syncRoles('User');
    }
}                   
