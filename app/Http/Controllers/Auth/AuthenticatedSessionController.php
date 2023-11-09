<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(Request $request): view
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request)//: RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        if(Auth::User()->isAdmin()){
            return redirect()->intended(RouteServiceProvider::HOMEAdmin);
        }
        
        else if(Auth::User()->isStudent()){
            return redirect()->intended(RouteServiceProvider::HOMEStudent);
        }

        else if(Auth::User()->isLecturer()){
            return redirect()->intended(RouteServiceProvider::HOMELecturer);
        }

    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
