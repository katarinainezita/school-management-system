<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'video'
    ];

    public function section(): MorphOne
    {
        return $this->morphOne(Section::class, 'content');
    }
}
