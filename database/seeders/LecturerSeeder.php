<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Education;
use App\Models\Lecturer;
use App\Models\WorkingExperience;
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
        Lecturer::factory()
                ->count(5)
                ->has(Education::factory()
                                ->count(2)
                                ->sequence(
                                    ['level' => 'S1'],
                                    ['level' => 'S2']
                                ))
                ->has(WorkingExperience::factory()->count(2))
                ->create();
    }
}
