<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Members extends Model
{
  protected $fillable = ['name', 'phone', 'email'];
  
  protected function transaction(){
    return $this->hasmany( Transactions::class);
  }
}
