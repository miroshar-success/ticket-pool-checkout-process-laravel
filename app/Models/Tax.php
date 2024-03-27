<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'amount_type',
        'price',
        'status',
        'allow_all_bill',
    ];

    protected $table = 'tax';
}
