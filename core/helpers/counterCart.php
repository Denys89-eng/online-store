<?php


class CounterCart
{

    public static function count()
    {
        $sum = 0;

        if (is_array($_SESSION['cart']) && count($_SESSION['cart'])>0) {
            foreach ($_SESSION['cart'] as $item) {
                $sum += $item;
            }
        }
        return $sum;


    }

}