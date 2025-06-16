<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use Notifiable;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'is_admin' => 'boolean',
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->id = $model->id ?? Str::uuid();
        });
    }

    /**
     * Vérifie si l'utilisateur est administrateur
     */
    public function isAdmin(): bool
    {
        return $this->is_admin;
    }
}
