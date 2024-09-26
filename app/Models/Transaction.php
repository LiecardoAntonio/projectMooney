<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $casts = [
        'date' => 'date',
    ];

    #transactions -> customers (many-to-one)
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    #transactions -> wallets (many-to-one)
    public function wallet()
    {
        return $this->belongsTo(Wallet::class);
    }

    #transactions -> transaction_types (one-to-one)
    public function transactionType()
    {
        return $this->belongsTo(TransactionType::class, 'transaction_type_id');
    }

    #transactions -> transaction_categories (one-to-one)
    public function transactionCategory()
    {
        return $this->belongsTo(TransactionCategory::class, 'transaction_category_id');
    }
}
