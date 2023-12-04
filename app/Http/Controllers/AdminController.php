<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CoursesRejected;
use App\Models\Module;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    //
    public function showCourses($page)
    {
        $numOfCourse = 9;
        $firstCourse = ($page - 1)*$numOfCourse;
        $courses = Course::where('verified', true)->get();
        $maxPage = ceil($courses->count() / $numOfCourse);

        // if exceeded page
        if (($page<1 | $page>$maxPage) && $maxPage!=0){
            return redirect(route('admin.course', ['page' => 1]));
        }

        $courses = $courses->slice($firstCourse, $numOfCourse);

        foreach ($courses as $course) {
            $course->modules = $course->numOfModules();
            $course->sections = $course->numOfSections();
        }

        return (view('admin.course-list', compact('courses', 'page')));
    }

    public function showProposalCourses($page)
    {
        $numOfCourse = 9;
        $firstCourse = ($page - 1)*$numOfCourse;
        $courses = Course::where('verified', false)->where('draft', false)->get();
        $maxPage = ceil($courses->count() / $numOfCourse);

        // if exceeded page
        if (($page<1 | $page>$maxPage) && $maxPage!=0){
            return redirect(route('admin.proposal.courses', ['page' => 1]));
        }

        $courses = $courses->slice($firstCourse, $numOfCourse);

        foreach ($courses as $course) {
            $course->modules = $course->numOfModules();
            $course->sections = $course->numOfSections();
        }

        return (view('admin.course-proposal', compact('courses', 'page')));
    }

    public function showDiscussions()
    {
        
    }

    public function showReviews()
    {
        
    }

    public function showRejections($page)
    {
        $numOfData = 10;
        $firstData = ($page - 1)*$numOfData;
        $datas = CoursesRejected::all();
        $maxPage = ceil($datas->count() / $numOfData);

        // if exceeded page
        if (($page<1 | $page>$maxPage) && $maxPage!=0){
            return redirect(route('admin.rejections', ['page' => 1]));
        }

        $datas = $datas->slice($firstData, $numOfData);

        return (view('admin.rejections', compact('datas', 'page')));
    }
}
