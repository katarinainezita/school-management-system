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
        $verifiedCourses = Course::all()->where('verified', true);
        $unverifiedCourses = Course::all()->where('verified', false);

        foreach ($verifiedCourses as $course) {
            $course->modules = $course->numOfModules();
            $course->sections = $course->numOfSections();
        }

        foreach ($unverifiedCourses as $course) {
            $course->modules = $course->numOfModules();
            $course->sections = $course->numOfSections();
        }

        return view('admin.course-list', [
            'verifiedCourses' => $verifiedCourses,
            'unverifiedCourses' => $unverifiedCourses,
        ]);
    }
}
