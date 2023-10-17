<?php

namespace App\Http\Module\Student\Domain\Services\Repository;

use App\Http\Module\Student\Domain\Model\Student;

interface StudentRepositoryInterface
{
    public function save(Student $student);

}