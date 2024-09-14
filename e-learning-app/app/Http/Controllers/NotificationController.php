<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Show notifications for the student
    public function index()
    {
        $notifications = auth('student')->user()->notifications; // Assuming notifications are related to the student
        return view('notifications.index', compact('notifications'));
    }
}
