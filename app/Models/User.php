<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $attributes = [
        'role' => 'tamu',
        'is_active' => true,
    ];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

        // Tambahin accessor
        public function setEmailAttribute($value)
        {
            $this->attributes['email'] = strtolower($value);
        }
}
