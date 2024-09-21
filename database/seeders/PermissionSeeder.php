<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Profile;
use App\Models\Document;
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

        // Create roles and assign permissions
        foreach ($roles as $role) {
            $newRole = Role::create($role); // Create role

            if ($role['name'] === 'Super Admin') {
                // Sync all permissions to Super Admin role
                $newRole->syncPermissions(Permission::all());
            } else {
                // Sync specific permission to User role
                $newRole->syncPermissions(['role-list']);
            }
        }

        // Create a Super Admin user
        $adminUser = User::create([
            'name' => 'Super Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'phone'=> '085345435345', // Use secure password here
            'phone_verified'=> true, // Use secure password here
            'is_admin'=> true, // Use secure password here
            'remember_token' => Str::random(10),
        ]);

        // Assign Super Admin role to the admin user
        $adminUser->assignRole('Super Admin');

        // Optionally create Profile and Document for the admin user
        Profile::create([
            'user_id' => $adminUser->id,
        ]);

        Document::create([
            'user_id' => $adminUser->id,
        ]);
    }
}
