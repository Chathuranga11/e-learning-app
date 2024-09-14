<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TimetableController extends Controller
{
    // Show the student's tutory timetable
    public function index()
    {
        $timetable = auth('student')->user()->timetable; // Assuming a relationship with the timetable
        return view('timetable.index', compact('timetable'));
    }
}
