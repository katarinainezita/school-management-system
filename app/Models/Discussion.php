<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Discussion extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment'
    ];

    protected $guarded = [
        'owner_id',
        'owner_type'
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function owner(): MorphTo
    {
        return $this->morphTo();
    }

    public function reply(): HasMany
    {
        return $this->hasMany(Reply::class);
    }
}
