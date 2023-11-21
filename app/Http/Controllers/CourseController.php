<?php

namespace App\Http\Controllers;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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
        $course->save();

        Auth::User()->role->courses()->attach($course->id);

        return redirect('/course/edit/'.$course->id);
    }

    public function editCourse ($id)
    {
        // check permission
        $course = Auth::user()->role->courses->where('id', $id)->first();
        if($course == null) {
            abort(403, 'Unauthorized action');
        }

        $module = $course->module;

        return view('course.edit', [
            'course' => $course,
        ]);
    }
}
