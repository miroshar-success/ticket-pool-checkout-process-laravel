<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'email',
        'message',
        'rate',
        'image',
    ];

    protected $table = 'feedback';

    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    
}
