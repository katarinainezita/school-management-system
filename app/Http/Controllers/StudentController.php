<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Course;
use App\Models\CourseStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $courses = Course::where('title', 'like', "%$query%")->where('description', 'like', "%$query%")->get();
        $cartItems = Cart::where('student_id', Auth::user()->student->id)->first('data');
        $cartItemsArray = json_decode($cartItems, true);
        return view('student.dashboard', compact('courses', 'cartItemsArray'));
    }

    public function myCourse(Request $request)
    {
        $query = $request->input('query');
        $courseStudent = CourseStudent::where('student_id', Auth::user()->student->id)->get();
        $courses = [];

        foreach ($courseStudent as $course) {
            if (str_contains($course->course->title, $query) || str_contains($course->course->description, $query)) {
                $courses[] = $course->course;
            }
        }

        return view('student.my-course', compact('courses'));
    }
}
