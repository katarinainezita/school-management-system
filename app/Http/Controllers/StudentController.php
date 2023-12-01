<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $cartItems = Cart::where('student_id', Auth::user()->student->id)->first('data');
        $cartItemsArray = json_decode($cartItems, true);
        return view('student.dashboard', compact('courses', 'cartItemsArray'));
    }
}
