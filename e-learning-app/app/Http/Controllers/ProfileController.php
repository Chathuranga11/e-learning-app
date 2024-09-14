<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // Show the student's profile
    public function index()
    {
        $student = auth('student')->user();
        return view('profile.index', compact('student'));
    }
}
