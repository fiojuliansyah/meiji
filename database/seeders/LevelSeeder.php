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
                'name' => 'Fresh Graduate'
            ],
            [
                'name' => 'Less Than 1 Year',
                'name' => 'Less Than 1 Year'
            ],
            [
                'name' => '1 Year',
                'name' => '1 Year'
            ],
        );
    }
}
