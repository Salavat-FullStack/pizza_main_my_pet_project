<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $casts = [
        'price' => 'float',
        'weight' => 'float',
        'calories' => 'float',
    ];

    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'ingredient_pizza');
    }
}
