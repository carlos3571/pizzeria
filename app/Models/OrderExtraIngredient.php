<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderExtraIngredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'extra_ingredient_id',
        'quantity',
    ];

    /**
     * Relaciones
     */

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function extraIngredient()
    {
        return $this->belongsTo(ExtraIngredient::class);
    }
}
