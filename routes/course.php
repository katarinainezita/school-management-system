<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::patch("/verify", [CourseController::class, 'verify'])
->middleware('auth', 'admin')->name('course.verify');

Route::post('/new', [CourseController::class, 'new'])
->middleware('auth', 'lecturer')->name('course.new');

Route::get('/edit/{slug}', [CourseController::class,'editCourse'])
->middleware('auth', 'lecturer', 'course.edit')->name('course.edit')

?>