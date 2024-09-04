<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    // Display the student registration form
    public function create()
    {
        return view('students.create');
    }

    // Handle the student registration form submission
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:students',
            'mobile' => 'required|string|max:15',
            'password' => 'required|string|confirmed|min:6',
            'school_name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        // Create the student
        Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password), // Hash the password before saving
            'school_name' => $request->school_name,
            'city' => $request->city,
        ]);

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Successfully registered! Please log in.');
    }
}
