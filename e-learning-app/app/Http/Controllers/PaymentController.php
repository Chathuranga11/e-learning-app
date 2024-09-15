<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;

class PaymentController extends Controller
{
    public function pay($id)
    {
        $lesson = Lesson::findOrFail($id);
        return view('payment-page', compact('lesson'));
    }

    public function processPayment(Request $request, $id)
    {
        // Simulate payment processing

        return redirect()->route('payment.complete');
    }

    public function complete()
    {
        return view('payment-complete');
    }
}


