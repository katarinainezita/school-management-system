<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    //
    public function showCourses(): View
    {
        $verifiedCourses = Course::where('verified', true)->get();
        $unverifiedCourses = Course::where('verified', false)->get();

        foreach ($verifiedCourses as $course) {
            $course->modules = $course->numOfModules();
            $course->sections = $course->numOfSections();
        }

        foreach ($unverifiedCourses as $course) {
            $course->modules = $course->numOfModules();
            $course->sections = $course->numOfSections();
        }

        return view('admin.course-list', compact('verifiedCourses', 'unverifiedCourses'));
    }
}
