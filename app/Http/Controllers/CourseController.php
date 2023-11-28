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

    public function showEditCourse ($slug)
    {
        $course = Auth::user()->role->courses->where('slug', $slug)->first();
        $course->totalStudents = $course->students->count();

        $module = $course->module;

        return view('course.edit', [
            'course' => $course,
        ]);
    }

    public function editCourseTitle(Request $request, $slug): RedirectResponse
    {
        $course = Course::where('slug', '=', $slug)->orWhere('title', '=', $request->course_title);

        // check if title already used
        if($course->count() > 1)
        {
            return redirect(route('course.edit', ['slug' => $slug]))->with(['status' => 'fail', 'message' => 'Cann\'t changed the title, duplicate title' ]);
        }

        $course = $course->first();
        $course->title = $request->course_title;
        $course->save();

        return redirect(route('course.edit', ['slug' => $slug]))->with(['status' => 'success', 'message' => 'Course\'s title has been changed' ]);
    }

    public function editCourseDesc(Request $request, $slug): RedirectResponse
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $course->description = $request->course_description;
        $course->save();

        return redirect(route('course.edit', ['slug' => $slug]))->with(['status' => 'success', 'message' => 'Course\'s description has been changed' ]);
    }

    public function showCourses()
    {
        $courses = Course::all();

        return view('guest.courses', [
            'courses' => $courses,
        ]);
    }

    public function showContent($slug, $module_order, $section_order)
    {
        $string = $slug." ".$module_order." ".$section_order;
        return $string;
    }

}
