<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Type>
 */
class TypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [[
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
        ],
        
        ];
    }
}
