<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterFormDataRequest;
use App\Models\Lecturer;
use App\Models\Student;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): RedirectResponse
    {
        return redirect(route('register.lecturer'));
    }

    public function createLecturer(): View
    {
        return view('auth.register-lecturer');
    }

    public function createStudent(): View
    {
        return view('auth.register-student');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(RegisterFormDataRequest $request): RedirectResponse
    {
        $route = RouteServiceProvider::HOME;
        $request->validated();

        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $request->profile_picture - $imagePath;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'class' => $request->class,
            'date_of_birth' => $request->date_of_birth,
            'role_type' => $request->type,
            'profile_picture' => $request->profile_picture,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        if ($user->role_type == 'App\Models\Student') {
            Student::create([
                'name' => $user->name,
                'user_id' => $user->id,
            ]);
            $route = RouteServiceProvider::HOMEStudent;
        } else if ($user->role_type == 'App\Models\Lecturer') {
            Lecturer::create([
                'name' => $user->name,
                'user_id' => $user->id,
            ]);
            $route = RouteServiceProvider::HOMELecturer;
        }

        return redirect(($route));
    }
}
