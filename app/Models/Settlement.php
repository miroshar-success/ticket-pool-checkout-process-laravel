<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;
    protected $fillable = [       
        'user_id',
        'payment',
        'payment_token',
        'payment_type',
        'payment_status',        
    ];

    protected $table = 'settlement';
}
