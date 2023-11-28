<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'order'
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function sections(): HasMany
    {
        return $this->hasMany(Section::class);
    }

    public function articles(): HasMany
    {
        return $this->hasMany(Section::class)->where('content_type', 'App\Models\Article');
    }

    public function video(): HasMany
    {
        return $this->hasMany(Section::class)->where('content_type', 'App\Models\Video');
    }

    public function quiz(): HasMany
    {
        return $this->hasMany(Section::class)->where('content_type', 'App\Models\Test');
    }

    public function numOfSections(): int
    {
        return $this->sections()->count();
    }

    public function numOfArticles(): int
    {
        return $this->hasMany(Section::class)->where('content_type', 'App\Models\Article')->select('id')->count();
    }

    public function numOfVideo(): int
    {
        return $this->hasMany(Section::class)->where('content_type', 'App\Models\Video')->select('id')->count();
    }

    public function numOfQuiz(): int
    {
        return $this->hasMany(Section::class)->where('content_type', 'App\Models\Test')->select('id')->count();
    }
}
