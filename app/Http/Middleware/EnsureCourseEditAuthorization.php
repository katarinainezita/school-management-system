<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class EnsureCourseEditAuthorization
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

        // check wether course is available
        if($course == null)
        {
            abort(404, 'Course not found');
        }

        // check wether lecturer has the course
        if (!$course->isLecturer(Auth::user()->lecturer->id)) {
            abort(403, 'You are not allowed to edit this course');
        };

        return $next($request);
    }
}
