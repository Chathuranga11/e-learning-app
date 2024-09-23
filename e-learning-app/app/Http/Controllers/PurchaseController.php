<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Purchase;

class PurchaseController extends Controller
{
    // Show purchase confirmation page
    public function purchaseConfirmation($lessonId)
    {
        $lesson = Lesson::find($lessonId);
        return view('students.purchase-confirmation', compact('lesson'));
    }

    // Handle purchase success
    public function purchaseSuccess($lessonId)
    {
        $lesson = Lesson::find($lessonId);

        // Create a purchase record
        Purchase::create([
            'student_id' => auth('student')->user()->id, // assuming student is authenticated
            'lesson_id' => $lesson->id,
            'purchase_id' => 'PUR' . strtoupper(uniqid()), // Generate unique purchase ID
        ]);

        return redirect()->route('lessons.active')->with('success', 'Lesson purchased successfully!');
    }

    // Handle purchase fail
    public function purchaseFail()
    {
        return redirect()->route('lessons.active')->with('error', 'Purchase failed.');
    }
}
