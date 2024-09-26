<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    #roles -> userWallets (one-to-one)
    public function userWallet()
    {
        return $this->belongsTo(UserWallet::class);
    }
}
