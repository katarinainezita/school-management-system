<?php

use App\Http\Controllers\LecturerController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified', 'lecturer'])->group(function () {
    Route::get('/lecturer/dashboard', function () {
        return view('lecturer.dashboard');
    })->name('lecturer.dashboard');

    Route::get('/lecturer/courses/{page}', [LecturerController::class, 'showCourses'])->name('lecturer.courses');

    Route::get('/lecturer/draft-courses/{page}', [LecturerController::class, 'showDraftCourses'])->name('lecturer.draft-courses');

    Route::get('/lecturer/submitted-courses/{page}', [LecturerController::class, 'showSubmittedCourses'])->name('lecturer.submitted-courses');

    Route::get('/lecturer/discussions/{page}', [LecturerController::class, 'showDiscussions'])->name('lecturer.discussions');

    Route::get('/lecturer/reviews/{page}', [LecturerController::class, 'showReviews'])->name('lecturer.reviews');

    Route::get('/lecturer/rejections/{page}', [LecturerController::class, 'showRejections'])->name('lecturer.rejections');
});

?>