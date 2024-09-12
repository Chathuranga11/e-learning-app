<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;  // Admin Model
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function create()
    {
        return view('admin.register');
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'mobile' => 'required|string|max:255',
            'password' => [
                'required',
                'string',
                'min:6',
                'max:15',
                'confirmed', // Ensures password matches the confirmation
                'regex:/[A-Z]/', // At least one uppercase letter
                'regex:/[a-z]/', // At least one lowercase letter
                'regex:/[0-9]/', // At least one digit
            ],
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        // Create the Admin
        Admin::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password), // Encrypt the password
            'address' => $request->address,
            'city' => $request->city,
            'is_active' => false,  // Set Admin as disabled by default
        ]);

        // Redirect to login with success message
        return redirect()->route('login')->with('success', 'Admin registered successfully. Please log in once activated.');
    }
}
