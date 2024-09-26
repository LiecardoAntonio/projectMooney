<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    #wallet -> userWallets (many-to-many)
    public function customers()
    {
        return $this->belongsToMany(Customer::class, 'user_wallets')->withTimestamps();
    }

    #wallet -> transactions (one-to-many)
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
