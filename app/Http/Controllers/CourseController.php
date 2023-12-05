<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Discussion;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;
use App\Mail\SendEmail;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    //
    public function verify(Request $request): RedirectResponse
    {
        $unverifiedCourse = Course::find($request->course_id);
        $unverifiedCourse->verified = true;
        $unverifiedCourse->save();

        // send email to lecturer
        $data['email'] = 'thoriq.afif.habibi@gmail.com';
        dispatch(new SendEmailJob($data));

        // send email to students if it's edit course


        return redirect(route('admin.proposal.courses', ['page' => 1]))->with(['status' => 'success']);
    }

    public function reject(Request $request)
    {
        $request->validate([
            'notes' => 'required',
        ]);

        $unverifiedCourse = Course::find($request->course_id);
        $unverifiedCourse->draft = true;
        $unverifiedCourse->rejections()->create([
            'message' => $request->notes
        ]);
        $unverifiedCourse->save();

        // send email to lecturer
        $data['email'] = 'thoriq.afif.habibi@gmail.com';
        dispatch(new SendEmailJob($data));

        return redirect(route('admin.proposal.courses', ['page' => 1]));
    }

    public function submit(Request $request)
    {
        $course = Course::find($request->course_id);
        $course->draft = false;
        $course->save();

        return redirect(route('lecturer.draft-courses', ['page' => 1]))->with(['status' => 'success']);
    }

    public function draft($slug)
    {
        $course = Course::where('slug', $slug)->first();
        $course->draft = true;
        $course->save();

        return redirect(route('course.edit', ['slug' => $course->slug]))->with(['status' => 'success']);
    }

    public function new(Request $request)
    {
        $course = new Course;
        $course->title = $request->title;
        $course->description = $request->description;
        $course->category = $request->category;
        $course->level = $request->level;
        $course->slug = Str::slug($request->title);

        $lecturer = Auth::user()->lecturer;

        $lecturer->courses()->save($course);

        return redirect(route('course.edit', ['slug' => $course->slug]));
    }

    public function showDetailCourse($slug): View
    {
        $course = Course::where('slug', $slug)->first();

        $course->lecturer = $course->lecturer->select('name', 'photo')->first();

        return view('course.detail', [
            'course' => $course
        ]);
    }

    public function showEditCourse($slug): View
    {
        $course = Auth::user()->lecturer->courses->where('slug', $slug)->first();
        $course->totalStudents = $course->students->count();

        $course->totalModules = $course->module;

        return view('course.edit', compact('course'));
    }

    public function editCourseTitle(Request $request, $slug): RedirectResponse
    {
        $course = Course::where('slug', '=', $slug)->orWhere('title', '=', $request->course_title);

        // check if title already used
        if ($course->count() > 1) {
            return redirect(route('course.edit', ['slug' => $slug]))->with(['status' => 'fail', 'message' => 'Cann\'t changed the title, duplicate title']);
        }

        $course = $course->first();
        $course->title = $request->course_title;
        $course->save();

        return redirect(route('course.edit', ['slug' => $slug]))->with(['status' => 'success', 'message' => 'Course\'s title has been changed']);
    }

    public function editCourseDesc(Request $request, $slug): RedirectResponse
    {
        $course = Course::where('slug', $slug)->firstOrFail();
        $course->description = $request->course_description;
        $course->save();

        return redirect(route('course.edit', ['slug' => $slug]))->with(['status' => 'success', 'message' => 'Course\'s description has been changed']);
    }

    public function showCourses(): View
    {
        $courses = Course::all();

        return view('guest.courses', compact('courses'));
    }

    public function showContent($slug, $module_order, $section_order): View
    {
        $course = Course::where('slug', $slug)->first();
        $course->modules = $course->modules()->select('id', 'title', 'order')->get();
        $content = null;

        // get sections
        foreach ($course->modules as $module) {
            $module->sections = $module->sections()->select('id', 'title', 'order', 'content_type')->get();
        }

        // content
        $moduleSelected = $course->modules()->select('id')->where('order', $module_order)->first();
        $sectionSelected = $moduleSelected->sections()->select('id', 'title', 'content_id', 'content_type')->where('order', $section_order)->first();

        $discussion = Discussion::where('section_id', $sectionSelected->id)->get();

        return view('course.learn', [
            'course' => $course,
            'section' => $sectionSelected,
            'discussion' => $discussion
        ]);
    }
}
