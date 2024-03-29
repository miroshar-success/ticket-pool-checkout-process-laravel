<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReport extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
        'email',
        'reason',
        'message',
    ];

    protected $table = 'event_report';

    public function event()
    {
        return $this->hasOne('App\Models\Event', 'id', 'event_id');
    }
}
