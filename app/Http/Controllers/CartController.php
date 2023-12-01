<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $course = Course::find($request->course);
        $courseId = $course->id;
        $cart = Cart::where('student_id', Auth::user()->student->id)->first();

        if (!$cart) {
            $cart = Cart::create([
                'student_id' => Auth::user()->student->id,
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
        $courseIdToRemove = $request->course;
        $course = Course::find($courseIdToRemove);
        $cart = Cart::where('student_id', Auth::user()->student->id)->first();

        if ($cart) {

            $courseIndex = collect($cart->data)->search(function ($cartItem) use ($courseIdToRemove) {
                return $cartItem['id'] == $courseIdToRemove;
            });

            if ($courseIndex !== false) {

                $cartCourses = $cart->data;
                array_splice($cartCourses, $courseIndex, 1);

                $cart->update(['data' => $cartCourses]);

                toastr()->success("Berhasil membeli course " . $course->title);
            } else {
                toastr()->info("Course tidak ditemukan di keranjang");
            }
        } else {
            toastr()->info("Keranjang tidak ditemukan");
        }

        return redirect()->back();
    }
}
