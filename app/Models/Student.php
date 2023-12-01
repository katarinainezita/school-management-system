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
        'user_id',
        'profilePicture',
        'dateOfBirth',
        'phoneNumber'
    ];

    public function user(): MorphOne
    {
        return $this->MorphOne(User::class, 'role');
    }

    public function courses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class);
    }

    public function cartCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class)->wherePivot('status', 'cart');
    }

    public function progressCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class)->wherePivot('status', 'learning progress')->withPivot('courseCompletion', 'score');
    }

    public function completedCourses(): BelongsToMany
    {
        return $this->belongsToMany(Course::class)->wherePivot('status', 'completed')->withPivot('score', 'review', 'rating');
    }

    public function education(): MorphMany
    {
        return $this->morphMany(Education::class,'owner');
    }

    public function workingExperience(): MorphMany
    {
        return $this->morphMany(WorkingExperience::class,'owner');
    }

    public function discussions(): MorphMany
    {
        return $this->morphMany(Discussion::class,'owner');
    }

    public function replies(): MorphMany
    {
        return $this->morphMany(Reply::class,'owner');
    }

}
