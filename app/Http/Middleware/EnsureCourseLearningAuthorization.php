<?php

namespace App\Http\Middleware;

use App\Models\Course;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class EnsureCourseLearningAuthorization
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $slug = $request->route('slug');
        $course = Course::where('slug', $slug)->firstOrFail();
        $userProfile = Auth::user()->role()->first();

        // if course not found
        if($course == null) 
        {
            abort(404, 'Course not found');
        }

        // if lecturer and is not their course
        if(Auth::user()->isLecturer())
        {
            if(!$course->isLecturer($userProfile->id))
            {
                abort(403, 'You are not allowed to open this course');
            }
        }

        // if students and doesn't have purchase/subscribe
        if(Auth::user()->isStudent())
        {
            if(!$course->isStudent($userProfile->id))
            {
                abort(403, 'You are not allowed to open this course');
            }
        }

        // admin have authorization to look all course

        return $next($request);
    }
}
