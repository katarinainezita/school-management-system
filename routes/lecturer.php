<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'lecturer'])->group(function () {
    Route::get('/lecturer/dashboard', function () {
        return view('lecturer.dashboard');
    })->name('lecturer.dashboard');
});

?>