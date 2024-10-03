<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->call(DepartementFactory::class);
        $this->call(LevelSeeder::class);
        $this->call(LocationSeeder::class);
        $this->call(TypeSeeder::class);

        $careers = [
            [
                'user_id' => 1,
                'departement_id' => 1,
                'level_id' => 1,
                'location_id' => 1,
                'type_id' => 1,
                'name' => 'Software Engineer',
                'salary' => '10000000',
                'placement' => 'OnSite',
                'experience' => '2 years',
                'deadline_date' => '2024-12-31',
                'description' => 'Develop and maintain software applications.',
            ],
            [
                'user_id' => 1,
                'departement_id' => 1,
                'level_id' => 1,
                'location_id' => 1,
                'type_id' => 2,
                'name' => 'Data Analyst',
                'salary' => '8000000',
                'placement' => 'Remote',
                'experience' => '1 year',
                'deadline_date' => '2024-11-30',
                'description' => 'Analyze and interpret complex data sets.',
            ],
            // Add more career entries as needed
        ];

        foreach ($careers as $career) {
            \App\Models\Career::create($career);
        }
    }
}
