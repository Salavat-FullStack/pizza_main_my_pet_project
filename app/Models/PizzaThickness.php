<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PizzaThickness extends Model
{
    protected $table = 'pizza_thickness';
    
    public function pizza()
    {
        return $this->belongsTo(Pizza::class);
    }
}
