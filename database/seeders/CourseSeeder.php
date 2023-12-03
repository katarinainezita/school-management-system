<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Education;
use App\Models\Lecturer;
use App\Models\Module;
use App\Models\Section;
use App\Models\Student;
use App\Models\WorkingExperience;
use App\Models\Article;
use Illuminate\Support\Facades\DB;
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
                                                    ['order'=> 1, 'content_id'=>1, 'content_type'=>'App\Models\Article'],
                                                    ['order'=> 2, 'content_id'=>2, 'content_type'=>'App\Models\Article'],
                                                    ['order'=> 3, 'content_id'=>3, 'content_type'=>'App\Models\Article'],
                                                    ['order'=> 4, 'content_id'=>4, 'content_type'=>'App\Models\Article'],
                                                    ['order'=> 5, 'content_id'=>5, 'content_type'=>'App\Models\Article'],
                                                )))
                ->has(Student::factory()
                                ->count(3)
                                ->has(Education::factory()
                                                ->count(1)
                                                ->state(['level' => 'S1'])
                                    )
                    )
                ->sequence(
                    ['lecturer_id' => 1],
                    ['lecturer_id' => 2],
                    ['lecturer_id' => 3],
                    ['lecturer_id' => 4],
                    ['lecturer_id' => 5],
                    ['lecturer_id' => 6],
                    ['lecturer_id' => 7],
                    ['lecturer_id' => 8],
                    ['lecturer_id' => 9],
                    ['lecturer_id' => 10],
                )
                ->create();
        
        DB::table('top_courses')->insert([
            ['course_id' => 1],
            ['course_id' => 2],
            ['course_id' => 3],
        ]);
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
