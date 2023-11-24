<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';

    protected $fillable = [
        'totalNumber',
        'duration'
    ];

    public function section(): MorphOne
    {
        return $this->morphOne(Section::class, 'content');
    }

    public function numberDetails(): HasMany
    {
        return $this->hasMany(NumberDetail::class);
    }
}
