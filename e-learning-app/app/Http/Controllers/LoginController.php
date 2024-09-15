<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    $guard = $request->user_type;

    if (Auth::guard($guard)->attempt($credentials)) {
        // Check if the user is active
        $user = Auth::guard($guard)->user();
        if ($user && !$user->is_active) {
            Auth::guard($guard)->logout();
            return redirect()->back()->with('error', 'Your account is inactive. Please contact support.');
        }

        // Redirect to the respective dashboard
        switch ($guard) {
            case 'student':
                return redirect()->route('students.dashboard');
            case 'teacher':
                return redirect()->route('teachers.dashboard');
            case 'admin':
                return redirect()->route('admins.dashboard');
            default:
                return redirect('/');
        }
    }

    // Authentication failed
    return redirect()->back()->with('error', 'Invalid credentials or account type.');
}
// Logout method
public function logout(Request $request)
{
    Auth::guard('student')->logout(); // Use 'student' guard if you have multiple guards
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('login'); // Redirect to the login page
}

}