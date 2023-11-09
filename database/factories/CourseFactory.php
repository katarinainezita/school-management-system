<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3),
            'description' => fake()->paragraph(7),
            'category' => fake()->randomElement(["Machine Learning", "Front End", "Backend", "Android", "IOS", "IoT"]),
            'level' => fake()->randomElement(["Dasar", "Pemula", "Menengah", "Mahir"]),
            'photo' => 'course/default.jpeg',
        ];
    }
}
