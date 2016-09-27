<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\PriceCalculator\PizzaPriceCalculator;

class Pizza extends Model
{
    protected $appends = ['amount'];

    public function ingredients() {
        return $this->belongsToMany('App\Ingredient', 'pizzas_ingredients', 'pizza_id', 'ingredient_id');
    }

    public function getAmountAttribute() {
        $pizzaPriceCalculator = new PizzaPriceCalculator();
        return $pizzaPriceCalculator->calculatePrice($this->ingredients()->get());
    }
}
