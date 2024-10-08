<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TimetableController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PaymentController;

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

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('students.dashboard');
});

Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::get('/register/student', [StudentController::class, 'create'])->name('student.register');


Route::post('/login', [LoginController::class, 'login'])->name('login.attempt');

// Routes for Student Registration
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// Routes for Teacher Registration
Route::get('/register/teacher', [TeacherController::class, 'create'])->name('teacher.register');
Route::post('/register/teacher', [TeacherController::class, 'store'])->name('teacher.store');

// Route for admin registration
Route::get('/register/admin', [AdminController::class, 'create'])->name('admin.register');
Route::post('/register/admin', [AdminController::class, 'store'])->name('admin.store');

Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');

Route::get('/students/dashboard', [StudentController::class, 'dashboard'])->name('students.dashboard');
Route::get('/teachers/dashboard', [TeacherController::class, 'dashboard'])->name('teachers.dashboard');
Route::get('/admins/dashboard', [AdminController::class, 'dashboard'])->name('admins.dashboard');

// Route for student dashboard
Route::get('/students/dashboard', [StudentController::class, 'dashboard'])->name('students.dashboard');

// Student Side Bar
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
Route::get('/cart', [CartController::class, 'index'])->name('cart');
//Route::get('/filter-teacher', [TeacherController::class, 'filter'])->name('filter.teacher');
Route::get('/tutory-timetable', [TimetableController::class, 'index'])->name('timetable');
Route::get('/active-lesson', [LessonController::class, 'active'])->name('active.lesson');
Route::get('/video-on-demand', [LessonController::class, 'videoOnDemand'])->name('video.on.demand');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route for filtering teachers
Route::get('/filter/teacher', [TeacherController::class, 'filter'])->name('filter.teacher');
Route::post('/filter/teacher', [TeacherController::class, 'getTeachers'])->name('filter.teacher.get');

// Route for viewing teacher lessons
Route::get('/teacher/{id}/lessons', [LessonController::class, 'list'])->name('teacher.lessons');

// Route for processing payment
Route::get('/lesson/{id}/pay', [PaymentController::class, 'pay'])->name('lesson.pay');
Route::post('/lesson/{id}/pay', [PaymentController::class, 'processPayment'])->name('lesson.processPayment');
Route::get('/payment/complete', [PaymentController::class, 'complete'])->name('payment.complete');


//Teacher Sidebar

Route::middleware(['auth:teacher'])->group(function () {
    Route::get('/teacher/notifications', [TeacherController::class, 'notifications'])->name('notifications');
    Route::get('/teacher/my-wall', [TeacherController::class, 'myWall'])->name('my.wall');
    //Route::get('/teacher/publish-class', [TeacherController::class, 'publishClass'])->name('publish.new.class');
    Route::get('/teacher/tutory-timetable', [TeacherController::class, 'tutoryTimetable'])->name('tutory.timetable');
    Route::get('/teacher/published-lessons', [TeacherController::class, 'publishedLessons'])->name('published.lessons');
    Route::get('/teacher/registry', [TeacherController::class, 'registry'])->name('go.registry');
    Route::get('/teacher/archive-lessons', [TeacherController::class, 'archiveLessons'])->name('archive.lessons');
    Route::get('/teacher/dashboard', [TeacherController::class, 'dashboard'])->name('teacher.dashboard');
    Route::get('/teacher/available-balance', [TeacherController::class, 'availableBalance'])->name('available.balance');
    Route::get('/teacher/profile', [TeacherController::class, 'profile'])->name('teacher.profile');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth:teacher'])->group(function () {
    Route::get('/teacher/profile', [TeacherController::class, 'profile'])->name('teacher.profile');
    Route::put('/teacher/profile', [TeacherController::class, 'updateProfile'])->name('teacher.profile.update');
    Route::get('/teacher/lessons/create', [LessonController::class, 'create'])->name('lessons.create');
    Route::post('/teacher/lessons', [LessonController::class, 'store'])->name('lessons.store');
    Route::get('/teacher/published-lessons', [LessonController::class, 'index'])->name('lessons.index');
    Route::put('/teacher/published-lessons', [LessonController::class, 'update'])->name('lessons.update');
});

// Student Routes
Route::post('/lessons/{lesson}/purchase', [LessonController::class, 'purchaseLesson'])->name('lessons.purchase');
Route::get('/students/active-lessons', [StudentController::class, 'activeLessons'])->name('students.active_lessons');

// Teacher Routes
Route::get('/lessons/{lesson}/purchased-students', [TeacherController::class, 'studentsWhoPurchased'])->name('teachers.purchased_students');

// Teacher Routes
Route::put('/teachers/update-lesson/{lesson}', [LessonController::class, 'updateLesson'])->name('teachers.update_lesson');
Route::get('/lessons/{lesson}/students', [TeacherController::class, 'studentsWhoPurchased'])->name('teachers.purchased_students');

Route::get('/lessons/{lesson}/students', [TeacherController::class, 'studentsWhoPurchased'])->name('teachers.purchased_students');

Route::get('/filter-teacher', [TeacherController::class, 'showFilterTeacherPage'])->name('filter.teacher');
Route::post('/get-teacher-lessons', [TeacherController::class, 'getTeacherLessons'])->name('get.teacher.lessons');

Route::get('/search-teachers', [TeacherController::class, 'searchTeachers'])->name('search.teachers');
Route::post('/get-teacher-lessons', [TeacherController::class, 'getTeacherLessons'])->name('get.teacher.lessons');


// Route to show active lessons
Route::get('/lessons/active', [LessonController::class, 'showActiveLessons'])->name('lessons.active');

// Route to handle lesson purchase
Route::post('/lessons/purchase/{lesson}', [LessonController::class, 'purchase'])->name('lessons.purchase');

// Route to show archived lessons
Route::get('/teacher/archived-lessons', [TeacherController::class, 'showArchivedLessons'])->name('teacher.archived.lessons');


Route::middleware(['auth:teacher'])->group(function () {
    Route::get('/teacher/archived-lessons', [TeacherController::class, 'showArchivedLessons'])->name('teachers.archived-lessons');
});

//Route::get('/tutory-time-table', [LessonController::class, 'showFutureLessons'])->name('tutory.time.table');
Route::get('/tutory-time-table', [TeacherController::class, 'tutoryTimetable'])->name('tutory.time.table');

// logout route for teachers
Route::post('/teacher/logout', [TeacherController::class, 'logout'])->name('teacher.logout');

// In web.php

Route::middleware('auth:student')->group(function () {
    Route::get('/students/active-lessons', [StudentController::class, 'activeLessons'])->name('students.active-lessons');
    Route::get('/students/purchase-lesson/{lesson}', [StudentController::class, 'purchaseLesson'])->name('purchase.lesson');
});

use App\Http\Controllers\PurchaseController;

// Active lessons
Route::get('/student/lessons/active', [StudentController::class, 'activeLessons'])->name('lessons.active');

// Purchase confirmation
Route::get('/lesson/purchase/{lesson}', [PurchaseController::class, 'purchaseConfirmation'])->name('lesson.purchase.confirmation');

// Purchase success
Route::get('/purchase/success/{lesson}', [PurchaseController::class, 'purchaseSuccess'])->name('purchase.success');

// Purchase fail
Route::get('/purchase/fail', [PurchaseController::class, 'purchaseFail'])->name('purchase.fail');

// Route to display the student's cart (purchased lessons)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

// Route to join a lesson (dummy example, you'll need to implement the joining functionality)
Route::get('/lessons/{lesson}/join', [LessonController::class, 'join'])->name('lessons.join');
Route::get('/lesson/{id}/watch', [LessonController::class, 'watchLesson'])->name('lesson.watch');



