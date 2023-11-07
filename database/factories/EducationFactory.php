<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'level' => fake()->randomElement(["S1", "S2", "S3"]),
            'institution' => 'Sepuluh Nopember Institute of Technology',
            'score' => fake()->randomFloat(2, 3, 4),
            'major' => fake()->randomElement(["Electrical Engineering", "Business", "Informatics", "Economy"]),
        ];
    }
}
