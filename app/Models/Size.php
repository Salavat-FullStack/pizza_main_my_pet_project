<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    public function pizzas()
    {
        return $this->belongsToMany(Pizza::class, 'pizza_sizes'); 
    }
}
