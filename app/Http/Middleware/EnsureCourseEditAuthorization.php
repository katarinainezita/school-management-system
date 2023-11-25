<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

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
        $course2 = Auth::user()->role->courses->firstWhere('slug', $slug);

        // check wether lecturer has the course
        if ($course2 == null) {
            abort(403, 'You are not allowed to edit this course');
        };

        return $next($request);
    }
}
