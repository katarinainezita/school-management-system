<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $guarded = [
        'email_verified_at'
    ];

    public function role(): MorphTo
    {
        return $this->morphTo();
    }

    public function lecturer() {
        return $this->hasOne(Lecturer::class, 'user_id');
    }

    public function student() {
        return $this->hasOne(Student::class, 'user_id');
    }

    public function isAdmin(): bool
    {
        return $this->role_type == 'App\Models\Admin';
    }

    public function isNotAdmin(): bool
    {
        return !($this->role_type == 'App\Models\Admin');
    }

    public function isStudent(): bool
    {
        return $this->role_type == 'App\Models\Student';
    }

    public function isNotStudent(): bool
    {
        return !($this->role_type == 'App\Models\Student');
    }

    public function isLecturer(): bool
    {
        return $this->role_type == 'App\Models\Lecturer';
    }

    public function isNotLecturer(): bool
    {
        return !($this->role_type == 'App\Models\Lecturer');
    }
}
