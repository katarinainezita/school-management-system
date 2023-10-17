<?php

namespace App\Http\Module\Product\Application\Services\CreateStudent;

use DateTime;

class CreateStudentRequest
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $class,
        public DateTime $dateOfBirth,
        public string $profilePicture,
        public float $score
    )
    {
    }
}