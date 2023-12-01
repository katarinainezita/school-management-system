<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoControler extends Controller
{
    public function store(Request $request)
    {
        $validatedRequest = $request->validate(
            [
                'video' => ['required', 'string'],
                'section_id' => ['required'],
            ]
        );

        Video::create($validatedRequest);

        toastr()->success('Berhasil menambahkan video');

        return redirect()->back();
    }


    public function edit(Request $request)
    {
        $validatedRequest = $request->validate(
            [
                'video' => ['required', 'string'],
            ]
        );

        Video::find($request->id)->update($validatedRequest);

        toastr()->success('Berhasil mengedit video');

        return redirect()->back();
    }
}
