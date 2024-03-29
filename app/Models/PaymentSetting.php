<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentSetting extends Model
{
    use HasFactory;
    protected $fillable = [
        'cod',
        'stripe',
        'paypal',
        'razor',
        'flutterwave',
        'stripeSecretKey',
        'stripePublicKey', 
        'paypalClientId',
        'paypalSecret',
        'razorPublishKey',
        'razorSecretKey',
        'ravePublicKey',
        'raveSecretKey',
        'flutterDebugMode',
        'wallet'
    ];

    protected $table = 'payment_setting';

}
