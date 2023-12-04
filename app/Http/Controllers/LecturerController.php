<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LecturerController extends Controller
{
    //
    public function showCourses($page)
    {
        $numOfData = 10;
        $firstData = ($page - 1)*$numOfData;
        $datas = Auth::user()->role->courses()->where('draft', false)->where('verified', true)->get();
        $maxPage = ceil($datas->count() / $numOfData);

        // if exceeded page
        if (($page<1 | $page>$maxPage) && $maxPage!=0){
            return redirect(route('lecturer.courses', ['page' => 1]));
        }

        $datas = $datas->slice($firstData, $numOfData);

        return view('lecturer.courses', compact('datas', 'page'));
    }

    public function showDraftCourses($page)
    {
        $numOfData = 10;
        $firstData = ($page - 1)*$numOfData;
        $datas = Auth::user()->role->courses()->where('draft', true)->get();
        $maxPage = ceil($datas->count() / $numOfData);

        // if exceeded page
        if (($page<1 | $page>$maxPage) && $maxPage!=0){
            return redirect(route('lecturer.courses', ['page' => 1]));
        }

        $datas = $datas->slice($firstData, $numOfData);

        return view('lecturer.draft-courses', compact('datas', 'page'));
    }

    public function showSubmittedCourses($page)
    {
        $numOfData = 10;
        $firstData = ($page - 1)*$numOfData;
        $datas = Auth::user()->role->courses()->where('draft', false)->where('verified', false)->get();
        $maxPage = ceil($datas->count() / $numOfData);

        // if exceeded page
        if (($page<1 | $page>$maxPage) && $maxPage!=0){
            return redirect(route('lecturer.courses', ['page' => 1]));
        }

        $datas = $datas->slice($firstData, $numOfData);

        return view('lecturer.submitted-courses', compact('datas', 'page'));
    }

    public function showDiscussions($page)
    {
    }

    public function showReviews($page)
    {
    }

    public function showRejections($page)
    {
        $numOfData = 10;
        $firstData = ($page - 1)*$numOfData;
        $datas = Auth::user()->role->courses;
        $maxPage = ceil($datas->count() / $numOfData);

        // if exceeded page
        if (($page<1 | $page>$maxPage) && $maxPage!=0){
            return redirect(route('admin.rejections', ['page' => 1]));
        }

        $datas = $datas->slice($firstData, $numOfData);

        return (view('lecturer.rejections', compact('datas', 'page')));
    }
}
