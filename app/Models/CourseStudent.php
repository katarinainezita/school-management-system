<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseStudent extends Model
{
    use HasFactory;

    protected $table = 'course_student';

    protected $fillable = [];

    protected $guarded = [
        'courseCompletion',
        'status',
        'score',
        'review',
        'rating'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function completedSections(): HasMany
    {
        return $this->hasMany(CompletedSection::class);
    }

    public function testAnswers(): HasMany
    {
        return $this->hasMany(TestAnswer::class);
    }
}
