<?php

namespace Database\Seeders;

use Database\Seeders\PermissionSeeders;
use App\Models\User;
use App\Models\Profile;
use App\Models\Document;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PermissionSeeder::class);
        User::factory(10)->create();
        $users = User::whereDoesntHave('roles', function ($query) {
            $query->where('name', 'Super Admin');
        })->get();

        foreach ($users as $user) {
            Profile::create([
                'user_id' => $user->id,
            ]);
    
            $user->syncRoles('User');
        }
    }
}
