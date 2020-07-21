<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function pizzas()
    {
    	return $this->belongsToMany(Pizza::class)->withPivot('quantity', 'price');
    }
}
