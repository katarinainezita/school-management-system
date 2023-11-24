<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CompletedSection extends Model
{
    use HasFactory;

    protected $table = 'completed_sections';

    protected $guarded = ['section_id'];

    public function courseStudent(): BelongsTo
    {
        return $this->belongsTo(CourseStudent::class);
    }

}
