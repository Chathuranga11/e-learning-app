<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Lesson;
use App\Http\Controllers\Subject;
// use App\Http\Controllers\Purchase;
use App\Models\Lesson;
use App\Models\Purchases;

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

//     public function activeLessons()
// {
//     $studentId = auth('student')->user()->id;
//     $activeLessons = Purchase::where('student_id', $studentId)->with('lesson')->get();

//     return view('students.active-lessons', compact('activeLessons'));
// }

public function activeLessons()
{
    $activeLessons = Lesson::where('lesson_date', '>=', now())->get(); // Fetch active lessons (future lessons)
    
    return view('students.active-lessons', compact('activeLessons'));
}

// In StudentController.php

public function purchaseLesson(Lesson $lesson)
{
    $student = auth('student')->user(); // Get the logged-in student

    // Check if the student has already purchased the lesson
    if ($student->purchases()->where('lesson_id', $lesson->id)->exists()) {
        return redirect()->back()->with('error', 'You have already purchased this lesson.');
    }

    // Create a new purchase
    $student->purchases()->create([
        'lesson_id' => $lesson->id,
        'purchase_id' => uniqid('PUR')
    ]);

    return redirect()->route('students.active-lessons')->with('success', 'Lesson purchased successfully!');
}




}
