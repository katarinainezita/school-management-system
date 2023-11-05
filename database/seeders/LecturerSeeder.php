<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("lecturers")->insert([
            'name' => fake()->name(),
            'phoneNumber' => fake()->phoneNumber(),
            'speciality' => 'Machine Learning',
            'description' => fake()->sentence(),
        ]);
    }
}
