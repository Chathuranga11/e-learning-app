<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Validate the login form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
            'user_type' => 'required|string|in:student,teacher,admin',
        ]);

        $credentials = $request->only('email', 'password');

        // Determine the guard to use based on the user type
        $guard = $request->user_type;

        if (Auth::guard($guard)->attempt($credentials)) {
            // Check if the user is active
            $user = Auth::guard($guard)->user();
            if (!$user->is_active) {
                Auth::guard($guard)->logout();
                return redirect()->back()->with('error', 'Your account is inactive. Please contact support.');
            }

            // Redirect to dashboard or home
            return redirect()->route('dashboard');
        }

        // Authentication failed
        return redirect()->back()->with('error', 'Invalid credentials or account type.');
    }
}
