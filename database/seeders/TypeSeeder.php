<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create(
            [
                'name' => 'Full time',
                'slug' => 'Full Time'
            ],
            [
                'name' => 'Part Time',
                'slug' => 'Part Time'
            ],
            [
                'name' => 'Internship',
                'slug' => 'Internship'
            ],
            [
                'name' => 'Freelancer',
                'slug' => 'Freelancer'
            ]);
    }
}
