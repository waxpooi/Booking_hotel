<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class AdminOrReceptionist extends Authenticatable
{
    protected $guard = 'admin'; 

    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password',
    ];
}
