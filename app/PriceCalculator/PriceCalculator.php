<?php
/**
 * Created by PhpStorm.
 * User: alvarobanofos
 * Date: 27/9/16
 * Time: 17:55
 */

namespace App\PriceCalculator;


interface PriceCalculator
{
    public function calculatePrice($prices);
}