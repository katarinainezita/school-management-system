<?php

namespace App\Console\Commands;

use App\Models\Course;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class TopCourse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:top-course';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Display top courses based on the count of students';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $courses = Course::all();
        $topCourses = DB::table('top_courses')->get();


        $sortedCourses = $courses->sortByDesc(function ($course) {
            return count($course->courseStudent);
        })->values();

        $top3Courses = $sortedCourses->take(3);

        foreach ($topCourses as $index => $top) {
            print($index);
            DB::table('top_courses')
                ->where('id', $index + 1)
                ->update(['course_id' => $top3Courses[$index]->id]);
        }

        print("Success Update Top Course !");
    }
}
