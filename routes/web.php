<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Course;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/dashboard', function () {
//     return view('guest.dashboard');
// }) -> name('guest.dashboard');

Route::get('/', function () {
    $topCourses = DB::table('top_courses')->select('course_id')->get()->pluck('course_id');
    $course = Course::whereIn('id', $topCourses)->get();

    return view('guest.home', ['topCourses' => $course]);
});

Route::get('/courses', [CourseController::class, 'showCourses'])->name('guest.courses');

// Route::get('/student/dashboard', function () {
//     return view('student.dashboard');
// })->middleware(['auth', 'verified', 'student'])->name('student.dashboard');

// Route::get('/admin/dashboard', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified', 'admin'])->name('admin.dashboard');

// Route::get('/lecturer/dashboard', function () {
//     return view('lecturer.dashboard');
// })->middleware(['auth', 'verified', 'lecturer'])->name('lecturer.dashboard');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::post("/discussion/send", [DiscussionController::class, 'send'])->name('discussion.send');
    Route::post("/reply/send", [DiscussionController::class, 'reply'])->name('reply.send');
});

foreach (scandir($path = app_path('Http/Module')) as $dir) {
    if (file_exists($filepath = "{$path}/{$dir}/Presentation/web.php")) {
        require $filepath;
    }
};

require __DIR__ . '/auth.php';
require __DIR__ . '/student.php';
require __DIR__ . '/admin.php';
require __DIR__ . '/lecturer.php';
require __DIR__ . '/course.php';