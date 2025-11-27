<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Type\Integer;

class DiscountRule extends Model
{
    protected $fillable = ['type', 'min_amount', 'discount_percent', 'active'];

    protected $casts = [
        'min_amount' => 'integer',
        'discount_percent' => 'integer',
        'active' => 'boolean'
    ];

    public static function active()
    {
        return self::where('active', true);
    }
        
    }

