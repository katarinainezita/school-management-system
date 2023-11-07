<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkingExperience>
 */
class WorkingExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'institution' => fake()->randomElement(['Google', 'Facebook', 'Goto']),
            'month_start' => fake()->month(),
            'year_start' => fake()->numberBetween(2010, 2015),
            'month_end' => fake()->month(),
            'year_end' => fake()->numberBetween(2016, 2023),
        ];
    }
}
