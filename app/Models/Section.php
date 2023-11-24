<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Section extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'order'
    ];

    protected $guarded = [
        'content_id',
        'content_type',
    ];

    public function module(): BelongsTo
    {
        return $this->belongsTo(Module::class);
    }

    public function content(): MorphTo
    {
        return $this->morphTo();
    }

    public function discussions(): HasMany
    {
        return $this->hasMany(Discussion::class);
    }
}
