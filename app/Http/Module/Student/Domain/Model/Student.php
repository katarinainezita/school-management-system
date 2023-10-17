<?php

namespace App\Http\Module\Student\Domain\Model;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Student
{
    /**
     * @param string $nama
     * @param float $price
     * @param string $description
     */
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