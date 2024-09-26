<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create([
            'name' => 'Jakarta Selatan',
            'slug' => 'Jakarta Selatan',
            'latlong' => '-6.229227732745046, 106.84717954232856',
        ]);
    }
}
