<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestAnswer extends Model
{
    use HasFactory;

    protected $table = 'test_answers';

    protected $guarded = ['test_id', 'score'];

    public function courseStudent(): BelongsTo
    {
        return $this->belongsTo(CourseStudent::class);
    }
}
