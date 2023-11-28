<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'description',
        'category',
        'level',
        'photo',
        'slug'
    ];

    protected $guarded = [
        'verified',
        'draft'
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)->wherePivotIn('status', ['learning progress', 'completed'])->withPivot('review', 'rating');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(CourseStudent::class)->select('review', 'rating')->whereNotNull(['review', 'rating']);
    }

    public function lecturer(): BelongsTo
    {
        return $this->belongsTo(lecturer::class);
    }

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }

    public function sections()
    {
        return $this->modules()->with('sections')->get()->flatMap->sections;
    }

    public function articles()
    {
        return $this->modules()->with('sections')->get()->flatMap->sections->where('content_type', 'App\Models\Article');
    }

    public function video()
    {
        return $this->modules()->with('sections')->get()->flatMap->sections->where('content_type', 'App\Models\Video');
    }

    public function quiz()
    {
        return $this->modules()->with('sections')->get()->flatMap->sections->where('content_type', 'App\Models\Test');
    }

    public function numOfModules(): int
    {
        return $this->modules()->select('id')->count();
    }

    public function numOfSections()
    {
        return $this->modules()->select('id')->with('sections')->get()->flatMap->sections;
    }

    public function numOfArticles()
    {
        return $this->modules()->select('id')->with('sections')->get()->flatMap->sections->where('content_type', 'App\Models\Article')->count();
    }

    public function numOfVideo()
    {
        return $this->modules()->select('id')->with('sections')->get()->flatMap->sections->where('content_type', 'App\Models\Video')->count();
    }

    public function numOfQuiz()
    {
        return $this->modules()->select('id')->with('sections')->get()->flatMap->sections->where('content_type', 'App\Models\Test')->count();
    }

    public function rejections(): HasMany
    {
        return $this->hasMany(CoursesRejected::class);
    }
}
