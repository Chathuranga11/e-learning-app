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

}
