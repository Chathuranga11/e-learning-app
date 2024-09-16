<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Subject;
use App\Http\Controllers\Purchase;

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
            'password' => 'required|string|min:6|confirmed',
            'school' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        // Create the student
        Student::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $request->mobile,
            'password' => Hash::make($request->password),
            'school' => $request->school,
            'city' => $request->city,
            'is_active' => true,
        ]);

        return redirect()->route('login')->with('success', 'Student registered successfully.');
    }

    // Display the student dashboard
    public function dashboard()
    {
        // Get the authenticated student
        $student = Auth::user();

        // Retrieve any posts or lessons to display on the dashboard
        $posts = []; // Replace this with actual data retrieval logic

        return view('students.dashboard', compact('student', 'posts'));
    }

    public function activeLessons()
{
    $studentId = auth('student')->user()->id;
    $activeLessons = Purchase::where('student_id', $studentId)->with('lesson')->get();

    return view('students.active-lessons', compact('activeLessons'));
}



}
