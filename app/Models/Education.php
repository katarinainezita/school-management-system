<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Education extends Model
{
    use HasFactory;

    public function owner(): MorphTo
    {
        return $this->morphTo();
    }
}
