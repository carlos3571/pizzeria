<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PizzaIngredient extends Model
{
    use HasFactory;

    protected $fillable = [
        'pizza_id',
        'ingredient_id',
    ];

    /**
     * Relaciones
     */

    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
}
