<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizerPaymentKeys extends Model
{
    use HasFactory;
    protected $fillable = [
        'organizer_id',
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
    ];
    protected $table = 'organizer_payment_keys';
}
