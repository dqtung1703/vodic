<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_locked',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_admin' => 'boolean',
            'is_locked' => 'boolean',
        ];
    }

    // Relationships
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    // Helper methods
    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    public function isLocked(): bool
    {
        return $this->is_locked;
    }
}
