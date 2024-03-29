<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Bavix\Wallet\Traits\HasWallet;

class Wallet extends Model
{
    use HasFactory;

    protected $table = 'wallets';

    public function user()
    {
        return $this->belongsTo(AppUser::class, 'holder_id');
    }

}
