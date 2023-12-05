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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
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
            // 'class' => $request->class,
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

    public function storeStudent(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:300',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg',
            'dateOfBirth' => 'required|date',
            'phoneNumber' => 'required|string|max:20',
            'email' => 'required|email',
            'password' => ['required', Password::min(8)]
        ]);


        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            // $request->profile_picture - $imagePath;
        }

        $student = Student::create([
            'name' => $request->name,
            'photo' => $imagePath,
            'dateOfBirth' => $request->dateOfBirth,
            'phoneNumber' => '111',
        ]);

        $student->user()->create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect((route('login')));
    }

    public function storeLecturer(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:300',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg',
            'dateOfBirth' => 'required|date',
            'phoneNumber' => 'required|string|max:20',
            'description' => 'required|string',
            'email' => 'required|email',
            'password' => ['required', Password::min(8)]
        ]);

        if ($request->hasFile('profile_picture')) {
            $imagePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            // $request->profile_picture - $imagePath;
        }

        $lecturer = Lecturer::create([
            'name' => $request->name,
            'phoneNumber' => $request->phoneNumber,
            'description' => $request->description,
            'dateOfBirth' => $request->dateOfBirth,
            'photo' => $imagePath,
        ]);

        $lecturer->user()->create([
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return redirect(route('login'));
    }
}
