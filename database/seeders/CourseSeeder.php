<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Education;
use App\Models\Lecturer;
use App\Models\Module;
use App\Models\Section;
use App\Models\Student;
use App\Models\WorkingExperience;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Course::factory()
                ->count(10)
                ->has(Module::factory()
                                ->count(3)
                                ->sequence(
                                    ['order' => 1],
                                    ['order' => 2],
                                    ['order'=> 3],
                                )->has(Section::factory()
                                                ->count(5)
                                                ->sequence(
                                                    ['order'=> 1],
                                                    ['order'=> 2],
                                                    ['order'=> 3],
                                                    ['order'=> 4],
                                                    ['order'=> 5],
                                                )))
                ->has(Lecturer::factory()
                                ->count(2)
                                ->has(Education::factory()
                                                ->count(2)
                                                ->sequence(
                                                    ['level' => 'S1'],
                                                    ['level' => 'S2']
                                                ))
                                ->has(WorkingExperience::factory()->count(2)))
                ->has(Student::factory()
                                ->count(3)
                                ->has(Education::factory()
                                                ->count(1)
                                                ->state(['level' => 'S1'])
                                    )
                    )
                ->create();
        // DB::table('courses')->insert([
        //     'name' => 'Mathematics',
        //     'teacher' => 'Frank Li',
        //     'day' => 'Monday',
        //     'time' => '07:00:00',
        //     'class' => 'B'
        // ]);

        // DB::table('courses')->insert([
        //     'name' => 'Physics',
        //     'teacher' => 'Yovanka Lip',
        //     'day' => 'Tuesday',
        //     'time' => '08:00:00',
        //     'class' => 'C'
        // ]);
    }
}
