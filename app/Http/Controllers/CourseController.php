<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    //
    public function verify(Request $request): RedirectResponse
    {
        $unverifiedCourse = Course::find($request->course_id);
        $unverifiedCourse->verified = true;
        $unverifiedCourse->save();

        return redirect(route('admin.courses'))->with(['status'=>'success']);
    }

    public function new(Request $request)
    {
        $course = new Course;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->category = $request->category;
        $course->level = $request->level;
        $course->slug = Str::slug($request->title);

        Auth::user()->role->courses()->save($course);

        return redirect(route('course.edit', ['slug' => $course->slug]));
    }

    public function editCourse ($slug)
    {
        // check permission
        $course = Auth::user()->role->courses->where('slug', $slug)->first();
        if($course == null) {
            abort(403, 'Unauthorized action');
        }

        $module = $course->module;

        return view('course.edit', [
            'course' => $course,
        ]);
    }

    public function showCourses()
    {
        $courses = Course::all();

        return view('guest.courses', [
            'courses' => $courses,
        ]);
    }

}
