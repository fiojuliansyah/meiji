<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementFactory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departement::create([
            'name' => 'IT Department',
            'slug' => 'iT Department',
            'img_url' => 'https://example.com/img/it.jpg',
            'img_public_id' => 'it-department-img',
        ]);
    }
}
