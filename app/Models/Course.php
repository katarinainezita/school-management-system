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
        'photo'
    ];

    protected $guarded = [
        'verified',
        'draft'
    ];

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class)->wherePivotIn('status', ['learning progress', 'completed']);
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

    public function numOfModules(): int
    {
        return $this->modules()->count();
    }

    public function numOfSections(): int
    {
        return $this->modules()->with('sections')->get()->flatMap->sections->count();
    }
}
