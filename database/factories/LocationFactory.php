<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => 'IT Department',
            'slug' => 'it-department',
            'img_url' => 'https://example.com/img/it.jpg',
            'img_public_id' => 'it-department-img',

        ];
    }
}
