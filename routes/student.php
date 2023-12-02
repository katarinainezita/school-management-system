<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'student'])->group(function () {
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.dashboard');
    Route::post('/student/course/add', [CartController::class, 'add'])->name('cart.add');
    Route::patch('/sudent/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');

    Route::get("/student/my-course", [StudentController::class, 'myCourse'])->name('student.mycourse');

    Route::get("/student/course/{slug}", [StudentController::class, 'detail'])->name('student.detail');
    
});
