<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Education;
use App\Models\Student;
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
        Student::factory()
                ->count(15)
                ->has(Education::factory()
                                ->count(1)
                                ->state(['level' => 'S1']))
                ->create();
    }
}
