<?php

use App\Http\Controllers\LecturerController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'lecturer'])->group(function () {
    Route::get('/lecturer/dashboard', function () {
        return view('lecturer.dashboard');
    })->name('lecturer.dashboard');

    Route::get('/lecturer/courses', [LecturerController::class, 'showCourses'])->name('lecturer.courses');

    Route::get('/lecturer/discussions', function () {
        return view('lecturer.dashboard');
    })->name('lecturer.discussions');

    Route::get('/lecturer/discussions', function () {
        return view('lecturer.dashboard');
    })->name('lecturer.discussions');

    Route::get('/lecturer/review', function () {
        return view('lecturer.dashboard');
    })->name('lecturer.review');

    Route::get('/lecturer/rejection', function () {
        return view('lecturer.dashboard');
    })->name('lecturer.rejection');
});

?>