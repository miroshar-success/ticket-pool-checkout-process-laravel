<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'image',
        'status',
        'event_id',
    ];

    protected $table = 'banner';

    public function event(){
        return $this->hasOne(Event::class,'id','event_id')->select(['id','name','description']);
    }
}
