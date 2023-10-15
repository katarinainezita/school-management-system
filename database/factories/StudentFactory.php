<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'class' => fake()->randomElement(['A','B','C']),
            'profilePicture' => 'student-1.png',
            'dateOfBirth' => fake()->date(),
            'score' => fake()->randomFloat(2,0,100),
            'remember_token' => Str::random(10),
            'email_verified_at' => now()
        ];
    }
}
