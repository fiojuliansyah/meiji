<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Level::class>
 */
class LevelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            [
                'name'=>'Fresh Graduate',
                'name'=>'Fresh Graduate'
            ],
            [
                'name'=>'Less Than 1 Year',
                'name'=>'Less Than 1 Year'
            ],
            [
                'name'=>'1 Year',
                'name'=>'1 Year'
            ],
        ];
    }
}
