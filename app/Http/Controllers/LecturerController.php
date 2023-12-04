<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{
    //
    public function showCourses()
    {
        $courses = Auth::user()->role->courses;

        return view('lecturer.courses', compact('courses'));
    }
}
