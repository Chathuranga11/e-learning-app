<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Support\Facades\Hash;
use App\Models\Purchase;
use App\Models\Lesson;

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


    public function updateLesson(Request $request, $lessonId)
    {
        // Validate the request
        $request->validate([
            'lesson_name' => 'required|string|max:255',
            'lesson_description' => 'required|string|max:255',
        ]);

        // Find the lesson and update its name and description
        $lesson = Lesson::findOrFail($lessonId);
        $lesson->lesson_name = $request->lesson_name;
        $lesson->lesson_description = $request->lesson_description;
        $lesson->save();

        return redirect()->route('teachers.published_lessons')->with('success', 'Lesson updated successfully.');
    }

    // public function studentsWhoPurchased($lessonId)
    // {
    //     $purchasedStudents = Purchase::where('lesson_id', $lessonId)->with('student')->get();
    //     return view('teachers.purchased-students', compact('purchasedStudents'));
    // }

    public function showFilterTeacherPage()
    {
        return view('students.filter'); // Adjust the view path as needed
    }

    public function searchTeachers(Request $request)
    {
        $teachers = Teacher::where('first_name', 'LIKE', '%' . $request->query('query') . '%')
            ->orWhere('last_name', 'LIKE', '%' . $request->query('query') . '%')
            ->get(['id', 'first_name', 'last_name']);

        return response()->json($teachers);
    }

    public function getTeacherLessons(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id'
        ]);

        // Fetch lessons for the selected teacher
        $lessons = Teacher::find($request->teacher_id)->lessons()->where('lesson_date', '>=', now())->get();

        return response()->json($lessons);
    }

    public function showArchivedLessons()
    {
        // Ensure to fetch the authenticated teacher
        $teacher = auth('teacher')->user();

        if ($teacher) {
            // Get lessons that are past the current date
            $archivedLessons = Lesson::where('lesson_date', '<', now())
                ->where('teacher_id', $teacher->teacher_id)
                ->get();
        } else {
            // If teacher is not authenticated, handle accordingly
            $archivedLessons = collect(); // Return an empty collection
        }

        return view('teachers.archived-lessons', compact('archivedLessons'));
    }

    public function tutoryTimetable()
    {
        // Fetch lessons with a future date and order by date
        $futureLessons = Lesson::where('lesson_date', '>=', now())
            ->orderBy('lesson_date', 'asc')
            ->with('teacher') // Ensure the teacher relationship is loaded
            ->get();

        // Pass the lessons to the view
        return view('teachers.future', compact('futureLessons'));
    }
    public function logout(Request $request)
    {
        auth('teacher')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login'); // Redirect to the teacher login or general login page
    }
    public function studentsWhoPurchased($lessonId)
{
    $lesson = Lesson::find($lessonId);
    $students = $lesson->purchases->map(function($purchase) {
        return $purchase->student;
    });

    return view('teacher.students-purchased', compact('students', 'lesson'));
}
}
