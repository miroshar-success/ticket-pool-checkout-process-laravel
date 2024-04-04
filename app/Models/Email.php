<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static findOrFail($id)
 */
class Email extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function toUser(): BelongsTo
    {
        return $this->belongsTo(AppUser::class,'to_user');
    }
}
