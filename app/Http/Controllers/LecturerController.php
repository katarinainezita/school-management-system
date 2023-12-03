<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{
    //
    public function showCourses()
    {
        $courses = Auth::user()->lecturer->courses;

        return view('lecturer.courses', compact('courses'));
    }
}
