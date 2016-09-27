<?php
/**
 * Created by PhpStorm.
 * User: alvarobanofos
 * Date: 27/9/16
 * Time: 18:00
 */

namespace App\PriceCalculator;


use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class PizzaPriceCalculator implements PriceCalculator
{

    //Returns the pizza's total price with 2 decimals format.
    public function calculatePrice($ingredients)
    {
        $amountIngredients = 0;

        foreach($ingredients as $ingredient) {
            $amountIngredients += $ingredient->amount;
        }
        $totalPrice = $amountIngredients + ($amountIngredients/2);
        return number_format($totalPrice, 2);
    }

}