<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Course;
use App\Models\CourseStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $studentId = Auth::user()->role->id;
        $course = Course::find($request->course);
        $courseId = $course->id;
        $cart = Cart::where('student_id', Auth::user()->role->id)->first();

        $alreadyBuyCourse = CourseStudent::where('student_id', $studentId)->where('course_id', $courseId)->first();

        if ($alreadyBuyCourse) {
            toastr()->info("Course sudah di beli");
            return redirect()->back();
        }

        if (!$cart) {
            $cart = Cart::create([
                'student_id' => Auth::user()->role->id,
                'courses' => [],
            ]);
        }

        $isCourseInCart = collect($cart->data)->contains(function ($cartItem) use ($courseId) {
            return $cartItem['id'] == $courseId;
        });

        if ($isCourseInCart) {
            toastr()->info("Course sudah di keranjang");
        } else {
            $cartCourses = $cart->data;
            $cartCourses[] = $course;
            $cart->update(['data' => $cartCourses]);

            toastr()->success("Berhasil menambahkan course " . $course->title);
        }

        return redirect()->back();
    }

    public function checkout(Request $request)
    {
        $studentId = Auth::user()->role->id;
        $courseIdToRemove = $request->course;
        $course = Course::find($courseIdToRemove);
        $cart = Cart::where('student_id', $studentId)->first();

        $alreadyBuyCourse = CourseStudent::where('student_id', $studentId)->where('course_id', $courseIdToRemove)->first();

        if ($alreadyBuyCourse) {
            toastr()->info("Course sudah di beli");
            return redirect()->back();
        }

        if ($cart) {
            $courseIndex = collect($cart->data)->search(function ($cartItem) use ($courseIdToRemove) {
                return $cartItem['id'] == $courseIdToRemove;
            });

            if ($courseIndex !== false) {

                $cartCourses = $cart->data;
                array_splice($cartCourses, $courseIndex, 1);

                $cart->update(['data' => $cartCourses]);
            }
        }

        CourseStudent::create([
            'student_id' => Auth::user()->role->id,
            'course_id' => $courseIdToRemove
        ]);

        toastr()->success("Berhasil membeli course " . $course->title);

        return redirect()->back();
    }
}
