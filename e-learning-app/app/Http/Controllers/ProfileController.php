<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Show the profile edit form
    public function edit()
    {
        $student = Auth::guard('student')->user();
        return view('profile.edit', compact('student'));
    }

    // Update the profile
    public function update(Request $request)
    {
        $request->validate([
            'mobile' => 'required|string|max:15',
        ]);

        $student = Auth::guard('student')->user();

        // Check if student is not null
        if ($student) {
            $student->mobile = $request->mobile;
            $student->save();
            return redirect()->route('profile')->with('success', 'Contact number updated successfully.');
        } else {
            return redirect()->route('profile')->with('error', 'Unable to update profile.');
        }
    }
}
