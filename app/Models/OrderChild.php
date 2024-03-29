<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderChild extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'customer_id',
        'ticket_id',
        'ticket_number',
        'status',
        'ticket_date',
    ];

    protected $table = 'order_child';

    public function getOrderDataAttribute()
    {
        $order  = Order::with(['customer:id,name,last_name,email,image'])->find($this->attributes['tax_id']);
    }

}
