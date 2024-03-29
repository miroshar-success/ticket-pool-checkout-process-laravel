<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'category_id',
        'tags',
        'image',
        'status',
    ];
    protected $appends = ['imagePath'];


    protected $table = 'blog';

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }
    public function getImagePathAttribute()
    {
        return url('images/upload') . '/';
    }
}
