<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\SectionController;
use App\Http\Controllers\VideoControler;
use Illuminate\Support\Facades\Route;

Route::patch("/verify", [CourseController::class, 'verify'])
    ->middleware('auth', 'admin')->name('course.verify');

Route::post('/new', [CourseController::class, 'new'])
    ->middleware('auth', 'lecturer')->name('course.new');

Route::get('/{slug}', [CourseController::class, 'showDetailCourse'])
    ->name('course.detail');

Route::post('/learn/add-article', [ArticleController::class, 'store'])->name('article.store');
Route::post('/learn/add-video', [VideoControler::class, 'store'])->name('video.store');
Route::patch('/learn/edit-article', [ArticleController::class, 'edit'])->name('article.edit');
Route::patch('/learn/edit-video', [VideoControler::class, 'edit'])->name('video.edit');

Route::middleware(['auth', 'lecturer', 'course.edit'])->group(function () {
    // course
    Route::get('/edit/{slug}', [CourseController::class, 'showEditCourse'])
        ->name('course.edit');

    Route::patch('/edit/{slug}/title', [CourseController::class, 'editCourseTitle'])
        ->name('course.edit.title');

    Route::patch('/edit/{slug}/desc', [CourseController::class, 'editCourseDesc'])
        ->name('course.edit.desc');

    // module
    Route::post('/new/module/{slug}', [ModuleController::class, 'new'])
        ->name('module.new');

    Route::delete('/delete/module/{slug}/{module_order}', [ModuleController::class, 'delete'])
        ->name('module.delete');

    Route::patch('/edit/{slug}/{module_id}', [ModuleController::class, 'editModuleTitle'])
        ->name('module.edit.title');

    // section
    Route::post('/new/section/{slug}/{module_id}', [SectionController::class, 'new'])
        ->name('section.new');

    Route::delete('/delete/section/{slug}/{module_id}/{section_order}', [SectionController::class, 'delete'])
        ->name('section.delete');

    Route::patch('/edit/{slug}/{module_id}/{section_id}', [SectionController::class, 'editModuleTitle'])
        ->name('section.edit');
});

Route::middleware(['auth', 'course.learn'])->group(function () {
    Route::get('/learn/{slug}/{module_order}/{section_order}', [CourseController::class, 'showContent'])
        ->name('course.learn');
});
