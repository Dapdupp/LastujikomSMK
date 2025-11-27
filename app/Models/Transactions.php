<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
   protected $fillable = ['user_id', 'member_id', 'total', 'discount', 'final_amount', 'cash_given', 'change'];
   
   protected $casts = [
    'total' => 'integer', 
    'discount' => 'integer', 
    'final_amount' => 'integer', 
    'cash_given' => 'integer', 
    'change' => 'integer', 
   ];

   //relasi 
   public function user() 
   {
    return $this->belongsTo(User::class);
   }
   public function member() 
   {
    return $this->belongsTo(Members::class);
   }
   public function items() 
   {
    return $this->hasmany(TransactionItem::class);
   }
}
