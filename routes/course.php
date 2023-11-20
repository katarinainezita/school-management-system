<?php

use App\Http\Controllers\CourseController;
use Illuminate\Support\Facades\Route;

Route::patch("/course/verify", [CourseController::class, 'verify'])->middleware('auth', 'admin')->name('course.verify');
?>