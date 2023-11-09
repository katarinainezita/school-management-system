<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'student'])->group(function () {
    Route::get('/student/dashboard', function () {
        return view('student.dashboard');
    })->name('student.dashboard');
});

?>