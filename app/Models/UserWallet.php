<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWallet extends Model
{
    use HasFactory;

    #userWallet -> customers (many-to-many)
    public function customers()
    {
        return $this->belongsToMany(Customer::class);
    }

    #userWallet -> roles (one-to-one)
    public function role()
    {
        return $this->hasOne(Role::class, 'role_id');
    }

    #userWallet -> wallets (many-to-many)
    public function wallets()
    {
        return $this->belongsToMany(Wallet::class);
    }
}
