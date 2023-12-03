<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Course;
use App\Models\CourseStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');

        $category = $request->input('category');

        $level = $request->input('level');

        $courses = Course::searchWithFilter($query, $category, $level);

        $cartItems = Cart::where('student_id', Auth::user()->student->id)->first('data');

        $cartItemsArray = json_decode($cartItems, true);

        return view('student.dashboard', compact('courses', 'cartItemsArray'));
    }

    public function myCourse(Request $request)
    {
        $query = $request->input('query');
        $category = $request->input('category');
        $level = $request->input('level');

        $courseStudent = CourseStudent::where('student_id', Auth::user()->student->id)->get();
        $courses = [];

        foreach ($courseStudent as $course) {
            $title = strtolower($course->course->title);
            $description = strtolower($course->course->description);
            $queryLower = strtolower($query);

            $categoryMatch = (!$category || strtolower($course->course->category) == strtolower($category));
            $levelMatch = (!$level || strtolower($course->course->level) == strtolower($level));

            if ((str_contains($title, $queryLower) || str_contains($description, $queryLower))) {
                if ($categoryMatch && $levelMatch) {
                    $courses[] = $course->course;
                }
            }
        }

        return view('student.my-course', compact('courses'));
    }

    public function detail($slug)
    {
        $course = Course::where('slug', $slug)->first();

        return view('student.detail-course', compact('course'));
    }
}
