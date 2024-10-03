<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::create(
            [
                'name' => 'Fresh Graduate',
                'slug' => 'Fresh Graduate'
            ],
            [
                'name' => 'Less Than 1 Year',
                'slug' => 'Less Than 1 Year'
            ],
            [
                'name' => '1 Year',
                'slug' => '1 Year'
            ],
        );
    }
}
