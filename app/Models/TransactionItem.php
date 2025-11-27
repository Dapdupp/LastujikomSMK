<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionItem extends Model
{
    protected $fillable = ['transaction_id', 'product_id', 'qty', 'price_at_transaction', 'subtotal'];

    protected $casts = [
        'qty' => 'integer',
        'price_at_transaction' => 'integer',
        'subtotal' => 'integer',
    ];

    public function transaction()
    {
        return $this->belongsTo(Transactions::class);
    }

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
