<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'event_id',
        'coupon_code',
        'discount',
        'start_date',
        'end_date',
        'description',
        'minimum_amount',
        'maximum_discount',
        'max_use',
        'use_count',
        'status' ,
        'discount_type',
    ];

    protected $table = 'coupon';
    public function event()
    {
        return $this->hasOne('App\Models\Event', 'id', 'event_id');
    }

}
