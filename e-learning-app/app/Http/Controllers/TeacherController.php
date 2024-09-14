<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;  // Import the Subject model

class TeacherController extends Controller
{

    public function create()
    {

        // Count the number of registered teachers (if needed)
        $teacherCount = Teacher::count();

        // Fetch all subjects to populate the dropdown
        $subjects = Subject::all(); // Fetch all subjects from the database

        // Pass the subjects and teacher count to the view
        return view('teachers.create', compact('teacherCount', 'subjects'));
    }

    public function store(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:teachers',
        'mobile' => 'required|string|max:15',
        'password' => 'required|string|confirmed|min:6',
        'subject_id' => 'required|exists:subjects,id',
        'city' => 'required|string|max:255',
    ]);

    Teacher::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'password' => bcrypt($request->password),
        'subject_id' => $request->subject_id,
        'city' => $request->city,
        'is_active' => true,
    ]);

    return redirect()->route('login')->with('success', 'Teacher registered successfully. Please log in once activated.');
}
// Filter teachers for the student
public function filter()
{
    $teachers = Teacher::all(); // Example of fetching all teachers
    return view('teachers.filter', compact('teachers'));
}

}

