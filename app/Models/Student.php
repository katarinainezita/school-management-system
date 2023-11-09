<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Student extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'email',
        'password',
        'class',
        'dateOfBirth',
        'profilePicture'
    ];

    public function user(): MorphOne
    {
        return $this->MorphOne(User::class, 'role');
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
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
