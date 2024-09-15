<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject; 
use Illuminate\Support\Facades\Hash;

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
        'password' => 'required|string|min:6|confirmed',
        'subject_id' => 'required|exists:subjects,id',
        'city' => 'required|string|max:255',
    ]);

    Teacher::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'email' => $request->email,
        'mobile' => $request->mobile,
        'password' => Hash::make($request->password),
        'subject_id' => $request->subject_id,
        'city' => $request->city,
        'is_active' => true,  // Set the teacher as inactive by default
    ]);

    return redirect()->route('login')->with('success', 'Teacher registered successfully. Please log in once activated.');
}


// Filter teachers for the student
public function filter()
{

    $teachers = Teacher::all(); 
    return view('teachers.filter', compact('teachers'));

    $subjects = Subject::all();
    return view('teachers.filter', compact('subjects'));
}

public function getTeachers(Request $request)
    {
    $teachers = Teacher::query();
        
    if ($request->has('subject_id') && $request->subject_id) {
        $teachers->where('subject_id', $request->subject_id);
    }
        $teachers = $teachers->get();
        return response()->json($teachers);
    }

    public function dashboard()
    {
        return view('teachers.dashboard');
    }

    public function profile()
    {
        $teacher = auth('teacher')->user(); // Ensure it uses the teacher guard
        return view('teachers.profile', compact('teacher'));
    }
    
    public function updateProfile(Request $request)
    {
        // Validate the request
        $request->validate([
            'mobile' => 'required|string|max:15',
        ]);
    
        // Update the teacher's contact number
        $teacher = auth('teacher')->user();
        $teacher->mobile = $request->mobile;
        $teacher->save();
    
        return redirect()->route('teacher.profile')->with('success', 'Contact number updated successfully.');
    }

}

