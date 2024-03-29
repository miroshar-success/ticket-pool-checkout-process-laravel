<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_id',
        'user_id',
        'ticket_number',
        'name',
        'type',
        'quantity',
        'ticket_per_order',
        'start_time',
        'end_time',
        'price',
        'description',
        'status',
        'is_deleted',
        'allday',
        'maximum_checkins',
        'seatmap_id',
        'ticket_key'
    ];

    protected $table = 'tickets';
    protected $dates = ['start_time','end_time'];

}
