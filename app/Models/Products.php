<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Products extends Model
{
  protected $fillable = ['name_products', 'price', 'initial_stock'];
  
  protected $cast = [
    'price' => 'integer',
    'initial_stock'=>'integer',
  ];

  public function transactionItems()
  {
    return $this->hasMany(TransactionItem::class, 'product_id');
  }

  protected function currentStock()
  {
    return Attribute::make(
      get: fn () => $this->initial_stock - $this->transactionItems()->sum('qty'),
    );
  }
}
