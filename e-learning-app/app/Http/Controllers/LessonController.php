<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LessonController extends Controller
{
    // Show active lessons for the student
    public function active()
    {
        $activeLessons = auth('student')->user()->activeLessons; // Assuming a relationship with active lessons
        return view('lessons.active', compact('activeLessons'));
    }
}
