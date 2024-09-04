<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function create()
    {
        // Count the number of registered teachers (if needed)
        $teacherCount = Teacher::count();

        // Pass the count to the view if needed, otherwise just return the view
        return view('teachers.create', compact('teacherCount'));
    }

    public function store(Request $request)
    {
        // Validate and save the teacher's data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:teachers',
            'mobile' => 'required|string|max:15',
            'password' => 'required|string|confirmed|min:6',
            'subjects' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        // Create the teacher
        Teacher::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => bcrypt($request->password),
            'subjects' => $request->subjects,
            'city' => $request->city,
            'is_active' => false,  // Set Admin as disabled by default
        ]);

        // Redirect to the login page with a success message
        return redirect()->route('login')->with('success', 'Teacher registered successfully. Please log in once activated.');
    }
}
