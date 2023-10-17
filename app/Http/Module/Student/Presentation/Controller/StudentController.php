<?php

namespace App\Http\Module\Student\Presentation\Controller;

use App\Http\Module\Student\Application\Services\CreateStudent\CreateStudentRequest;
use App\Http\Module\Student\Application\Services\CreateStudent\CreateStudentService;
use Illuminate\Http\Request;

class StudentController
{
    public function __construct(
        private CreateStudentService $create_student_service
    )
    {
    }

    public function createStudent(Request $request){
        // dd($request);
        $request = new CreateStudentRequest(
            $request->input('name'),
            $request->input('email'),
            $request->input('password'),
            $request->input('class'),
            $request->input('dateOfBirth'),
            $request->input('profilePicture'),
            $request->input('score')
        );

        return $this->create_student_service->execute($request);
    }
}