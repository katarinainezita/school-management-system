<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'teacher',
        'day',
        'time',
        'class'
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function lecturers(): BelongsToMany
    {
        return $this->belongsToMany(lecturer::class);
    }

    public function modules(): HasMany
    {
        return $this->hasMany(Module::class);
    }

    public function numOfModules(): int
    {
        return $this->modules()->count();
    }

    public function numOfSections()
    {
        return $this->modules()->with('sections')->get()->flatMap->sections->count();
    }
}
