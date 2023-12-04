<?php

use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

    Route::get('/admin/courses/{page}', [AdminController::class, 'showCourses'])->name('admin.courses');

    Route::get('/admin/proposal-courses/{page}', [AdminController::class, 'showProposalCourses'])->name('admin.proposal.courses');

    Route::get('/admin/discussions/{page}', [AdminController::class, 'showDiscussions'])->name('admin.discussions');

    Route::get('/admin/reviews/{page}', [AdminController::class, 'showReviews'])->name('admin.reviews');

    Route::get('/admin/rejections/{page}', [AdminController::class, 'showRejections'])->name('admin.rejections');
});
?>