<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        // Get all purchases for the authenticated student
        $purchases = Purchase::where('id', Auth::id())->with('lesson')->get();

        return view('cart.index', compact('purchases'));
    }
}
