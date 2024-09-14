<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // Show the cart items for the student
    public function index()
    {
        $cartItems = auth('student')->user()->cartItems; // Assuming a relationship with cart items
        return view('cart.index', compact('cartItems'));
    }
}
