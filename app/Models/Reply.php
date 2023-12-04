<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Reply extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',

    ];

    public function discussion(): BelongsTo
    {
        return $this->belongsTo(Discussion::class);
    }

    public function owner(): MorphTo
    {
        return $this->morphTo();
    }

    public function user() {
        return $this->belongsTo(User::class, 'owner_id');
    }
}
