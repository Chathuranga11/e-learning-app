<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubjectController;

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

Route::middleware(['auth', 'active'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('subjects', SubjectController::class);
});

Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::get('/register/student', [StudentController::class, 'create'])->name('student.register');

// Routes for Student Registration
Route::get('/register/student', [StudentController::class, 'create'])->name('student.register');
Route::post('/register/student', [StudentController::class, 'store'])->name('student.store');

// Routes for Teacher Registration
Route::get('/register/teacher', [TeacherController::class, 'create'])->name('teacher.register');
Route::post('/register/teacher', [TeacherController::class, 'store'])->name('teacher.store');

// Route for admin registration
Route::get('/register/admin', [AdminController::class, 'create'])->name('admin.register');
Route::post('/register/admin', [AdminController::class, 'store'])->name('admin.store');

Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
