<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table("students")->insert([
            'name' => fake()->name(),
            'dateOfBirth' => fake()->date(),
            'phoneNumber' => fake()->phoneNumber()
        ]);
    }
}
