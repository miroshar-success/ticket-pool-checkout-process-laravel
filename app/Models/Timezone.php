<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timezone extends Model
{
    use HasFactory;
    protected $fillable = [
        'CountryCode',
        'Coordinates',
        'TimeZone',
        'Comments',
        'UTC_offset',
        'UTC_DST_offset',
        'Notes',       
    ];

    protected $table = 'timezones';
}
