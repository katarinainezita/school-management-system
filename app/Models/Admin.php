<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Model implements Authenticatable
{
    use HasFactory;
    use AuthenticatableTrait;

    protected $fillable=[
        'name'
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'role');
    }

    public function courseRejects(): HasMany
    {
        return $this->hasMany(CoursesRejected::class);
    }
}
