<?php

namespace App\Http\Controllers;

use App\Models\Discussion;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    public function send(Request $request)
    {
        $authUser = Auth::user();
        $validatedRequest = $request->validate([
            'comment' => ['required', 'string'],
            'section_id' => ['required']
        ]);

        $validatedRequest['owner_type'] = $authUser->isStudent() ? 'App\Models\Student' : 'App\Models\Lecturer';
        $validatedRequest['owner_id'] = $authUser->id;

        Discussion::create($validatedRequest);

        return redirect()->back();
    }

    public function reply(Request $request)
    {
        $authUser = Auth::user();
        $validatedRequest = $request->validate([
            'comment' => ['required', 'string'],
            'discussion_id' => ['required']
        ]);

        $validatedRequest['owner_type'] = $authUser->isStudent() ? 'App\Models\Student' : 'App\Models\Lecturer';
        $validatedRequest['owner_id'] = $authUser->id;

        Reply::create($validatedRequest);

        return redirect()->back();
    }
}
