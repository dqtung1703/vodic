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
        'google_id',
        'avatar',
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

    public function comments()
    {
        return $this->hasMany(Comment::class);
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

    public function hasAvatar(): bool
    {
        return !empty($this->avatar);
    }

    public function getAvatarUrl(): string
    {
        if ($this->hasAvatar()) {
            return asset('storage/' . $this->avatar);
        }
        return '';
    }

    public function getAvatarOrInitial(): string
    {
        if ($this->hasAvatar()) {
            return $this->getAvatarUrl();
        }
        return strtoupper(substr($this->name, 0, 1));
    }

    /**
     * Send the password reset notification.
     */
    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new \App\Notifications\ResetPassword($token));
    }
}
