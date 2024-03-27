<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
        'type',
        'address',
        'category_id',
        'start_time',
        'end_time',
        'image',
        'gallery',
        'people',
        'lat',
        'lang',
        'description',
        'security',
        'status',
        'event_status',
        'is_deleted',
        'scanner_id',
        'tags',
        'url',
    ];

    protected $table = 'events';
    protected $dates = ['start_time', 'end_time'];
    protected $appends = ['imagePath', 'rate', 'totalTickets', 'soldTickets'];

    public function category()
    {
        return $this->hasOne('App\Models\Category', 'id', 'category_id');
    }

    public function organization()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
    public function ticket()
    {
        return $this->hasMany('App\Models\Ticket', 'event_id', 'id');
    }

    public function getImagePathAttribute()
    {
        return url('images/upload') . '/';
    }

    public function getTotalTicketsAttribute()
    {
        $timezone = Setting::find(1)->timezone;
        $date = Carbon::now($timezone);
        return intval(Ticket::where([['event_id', $this->attributes['id']], ['is_deleted', 0], ['status', 1], ['end_time', '>=', $date->format('Y-m-d H:i:s')], ['start_time', '<=', $date->format('Y-m-d H:i:s')]])->sum('quantity'));
    }

    public function getSoldTicketsAttribute()
    {
        // (new AppHelper)->eventStatusChange();
        return  intval(Order::where('event_id', $this->attributes['id'])->sum('quantity'));
        // return  Order::where('event_id', $this->attributes['id'])->sum('quantity');
    }

    public function getRateAttribute()
    {
        $review =  Review::where('event_id', $this->attributes['id'])->get(['rate']);
        if (count($review) > 0) {
            $totalRate = 0;
            foreach ($review as $r) {
                $totalRate = $totalRate + $r->rate;
            }
            return  round($totalRate / count($review));
        } else {
            return 0;
        }
    }

    public function scopeDurationData($query, $start, $end)
    {
        $data =  $query->whereBetween('start_time', [$start,  $end]);
        return $data;
    }
}
