<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Lecturer extends Model
{
    use HasFactory;

    public $fillable = [
        'name',
        'user_id',
        'phoneNumber',
        'description',
        'dateOfBirth',
        'photo'
    ];

    public function user(): MorphOne
    {
        return $this->MorphOne(User::class, 'role');
    }

    public function courses(): HasMany
    {
        return $this->hasMany(Course::class);
    }

    public function draftCourses()
    {
        return $this->hasMany(Course::class)->where('draft', true);
    }

    public function education(): MorphMany
    {
        return $this->morphMany(Education::class,'owner');
    }

    public function workingExperience(): MorphMany
    {
        return $this->morphMany(WorkingExperience::class,'owner');
    }
}
