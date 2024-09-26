<?php
namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model implements Authenticatable
{
    use HasFactory;

    // Define the table if it's not the default "customers"
    protected $table = 'customers';

    // The attributes that are mass assignable
    protected $fillable = [
        'name', 'email', 'password',
    ];

    // The attributes that should be hidden for arrays
    protected $hidden = [
        'password', 'remember_token',
    ];

    // Implementing Authenticatable methods

    public function getAuthIdentifierName()
    {
        return 'id'; // Assuming 'id' is your primary key field name
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->remember_token;
    }

    public function setRememberToken($value)
    {
        $this->remember_token = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }
    
    // Define relationships
    public function wallets()
    {
        return $this->belongsToMany(Wallet::class, 'user_wallets')->withTimestamps();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}