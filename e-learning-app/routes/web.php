<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AuthController;

Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::get('/register/student', [StudentController::class, 'create'])->name('student.register');

Route::get('/', function () {
    return view('landing');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/register/student', function () {
    return view('student-registration');
});

Route::get('/register/teacher', function () {
    return view('teacher-registration');
});

Route::get('/login', function () {
    return view('login');
})->name('login');


// Routes for Student Registration
Route::get('/register/student', [StudentController::class, 'create'])->name('student.register');
Route::post('/register/student', [StudentController::class, 'store'])->name('student.store');

// Routes for Teacher Registration
Route::get('/register/teacher', [TeacherController::class, 'create'])->name('teacher.register');
Route::post('/register/teacher', [TeacherController::class, 'store'])->name('teacher.store');
