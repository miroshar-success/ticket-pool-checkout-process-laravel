<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Traits\CanPay;
use Bavix\Wallet\Interfaces\Customer;

class AppUser extends Authenticatable implements Wallet
{
    use HasFactory, Notifiable, HasApiTokens;
    protected $guard = 'appuser';
    use HasWallet;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'image',
        'address',
        'status',
        'following',
        'provider',
        'favorite',
        'favorite_blog',
        'phone',
        'lat', 'lang',
        'bio',
        'provider_token',
        'device_token',
        'language',
        'deleted_at ',
        'is_verify',
        'Gender',
        'DateOfBirth',
        'Country',
        'City'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'app_user';
    protected $appends = ['imagePath'];

    public function getImagePathAttribute()
    {
        return url('images/upload') . '/';
    }
}
