<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function showProfile(){
        $user = auth()->user();
        return view('student.dashboard',[
            'student' => $user
        ]);
    }

    public function updateProfile(Request $request){
        $user = auth()->user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'dateOfBirth' => 'required|date',
            'profilePicture' => 'mimes:jpg,jpeg,png'
        ]);
        $imgName = "student-".$user->id.".".$request->profilePicture->getClientOriginalExtension();

        if($request->profilePicture){            
            Storage::delete('public/img/'.$user->profilePicture);
            $request->profilePicture->storeAs('public/img',$imgName);
        }

        DB::table('students')->where('id',$user->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'dateOfBirth' => $request->dateOfBirth,
            'profilePicture' => $imgName
        ]);

        return redirect('student/dashboard')->with(['status'=>'Data berhasil diupdate']);
    }
}
