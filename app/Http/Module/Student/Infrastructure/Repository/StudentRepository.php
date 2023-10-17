<?php

namespace App\Http\Module\Student\Infrastructure\Repository;

use App\Http\Module\Student\Domain\Model\Student;
use App\Http\Module\Student\Domain\Services\Repository\StudentRepositoryInterface;
use Illuminate\Support\Facades\DB;

class StudentRepository implements StudentRepositoryInterface
{
    public function save(Student $student)
    {
        DB::table('students')->upsert(
            [
                'name' => $student->name,
                'email' => $student->email,
                'password' => $student->password,
                'class' => $student->class,
                'dateOfBirth' => $student->dateOfBirth,
                'profilePicture' => $student->profilePicture,
                'score' => $student->score,
            ],'name'
        );
    }
}