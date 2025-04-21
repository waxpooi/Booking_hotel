<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'email', 'check_in', 'check_out', 'tanggal', 'status', 'payment_status', 'payment_proof'
    ];
}
