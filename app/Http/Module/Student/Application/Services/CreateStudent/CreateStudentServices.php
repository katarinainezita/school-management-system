<?php

namespace App\Http\Module\Student\Application\Services\CreateStudent;

use App\Http\Module\Student\Domain\Model\Student;
use App\Http\Module\Student\Infrastructure\Repository\StudentRepository;

class CreateStudentService
{

    public function __construct(
        private StudentRepository $student_repository
    )
    {
    }

    public function execute(CreateStudentRequest $request){
        $student = new Student(
            $request->name,
            $request->email,
            $request->password,
            $request->class,
            $request->dateOfBirth,
            $request->profilePicture,
            $request->score,
        );

        $this->student_repository->save($student);
    }
}