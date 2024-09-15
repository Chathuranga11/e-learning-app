<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Teacher;
use App\Models\Lesson;


class LessonController extends Controller
{
    // Show active lessons for the student
    public function active()
    {
        $activeLessons = auth('student')->user()->activeLessons; 
        return view('lessons.active', compact('activeLessons'));
    }
    public function list($id)
    {
        $teacher = Teacher::findOrFail($id);
        $lessons = Lesson::where('teacher_id', $id)->get();
        
        return view('teacher-lessons', compact('teacher', 'lessons'));
    }

    // Show the lesson creation form
    public function create()
    {
        return view('teachers.create-lesson');
    }

    // Handle the form submission and store the lesson
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'lesson_name' => 'required|string|max:255',
            'lesson_description' => 'required|string',
            'lesson_date' => 'required|date',
            'lesson_duration' => 'required|string',
            'lesson_fee' => 'required|numeric',
        ]);

        // Create the lesson
        Lesson::create([
            'lesson_name' => $request->lesson_name,
            'lesson_description' => $request->lesson_description,
            'lesson_date' => $request->lesson_date,
            'lesson_duration' => $request->lesson_duration,
            'lesson_fee' => $request->lesson_fee,
            'lesson_id' => 'LSID' . str_pad(Lesson::count() + 1, 4, '0', STR_PAD_LEFT),
            'teacher_id' => auth('teacher')->id(),
            'subject_id' => auth('teacher')->user()->subject_id,  
        ]);

        // Redirect back with a success message
        return redirect()->route('lessons.create')->with('success', 'Lesson created successfully.');
    }

    public function index()
{
    // Get future lessons only
    $lessons = Lesson::where('lesson_date', '>', now())
                ->where('teacher_id', auth('teacher')->user()->teacher_id)
                ->get();

    return view('teachers.published-lessons', compact('lessons'));
}

public function update(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'lesson_name' => 'required|string|max:255',
        'lesson_description' => 'required|string',
    ]);

    // Find the lesson and update it
    $lesson = Lesson::findOrFail($id);
    $lesson->lesson_name = $request->lesson_name;
    $lesson->lesson_description = $request->lesson_description;
    $lesson->save();

    return redirect()->route('lessons.index')->with('success', 'Lesson updated successfully');
}


}