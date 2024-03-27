<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'status',
        'phone',
        'image',
        'device_token',
        'org_id',
        'bio',
        'country',
        'language',
        'is_verify'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $appends = ['followers', 'imagePath'];

    public function getFollowersAttribute()
    {
        $appuser = AppUser::get();
        $followers = array();
        foreach ($appuser as $user) {
            if (in_array($this->attributes['id'], array_filter(explode(',', $user->following)))) {
                array_push($followers, $user->id);
            }
        }
        return $followers;
    }

    public function getImagePathAttribute()
    {
        return url('images/upload') . '/' . $this->attributes['image'];
    }
    
    public function events()
    {
        return $this->hasMany(Event::class);
    }

}
