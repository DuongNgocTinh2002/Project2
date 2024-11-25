<?php 

// app/Services/Cart.php

namespace App\Services;

use Illuminate\Support\Facades\Session;

class Cart {
    protected $cartKey = 'cart';

    public static function getCart() {
        return Session::get('cart', []);
    }


}