<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\EmployerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Routes for students
Route::group(['middleware' => ['auth:student']], function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    // Other student routes
});

// Routes for employers
Route::group(['middleware' => ['auth:employer']], function () {
    Route::get('/employer/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
    // Other employer routes
});


/*----------------------------------------------------------------------------
#student section
------------------------------------------------------------------------------*/
Route::get('/student-login', [StudentController::class, 'showLogin'])->name('student-login');
Route::get('/student-register', [StudentController::class, 'showRegister'])->name('student-register');
Route::get('/student-home', [StudentController::class, 'showHome'])->name('student-dashboard');
Route::get('/log-book', [StudentController::class, 'showLogBook'])->name('log-book');
Route::get('/student-profile', [StudentController::class, 'showStudentProfile'])->name('student-profile');

/*----------------------------------------------------------------------------
#admin section
------------------------------------------------------------------------------*/
Route::get('/login', [EmployerController::class, 'showLogin'])->name('login');
Route::post('/login', [EmployerController::class, 'login'])->name('login-employer-method');
Route::get('/register', [EmployerController::class, 'showRegister'])->name('register');
Route::get('/home', [EmployerController::class, 'showHome'])->name('dashboard'); 
Route::get('/attendance', [EmployerController::class, 'showAttendance'])->name('attendance');
Route::get('/applicant-attendance', [EmployerController::class, 'showApplicantAttendance'])->name('applicant-attendance');
Route::get('/post', [EmployerController::class, 'showPost'])->name('post');
Route::get('/profile', [EmployerController::class, 'showUsersProfile'])->name('profile');
Route::get('/confirm-applications', [EmployerController::class, 'showConfirmApplications'])->name('confirm-applications');
Route::get('/applicant', [EmployerController::class, 'showApplicant'])->name('applicant');

/*----------------------------------------------------------------------------
#home section
------------------------------------------------------------------------------*/
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/fieldwork-details', [HomeController::class, 'fieldworkDetails'])->name('fieldwork-details');
Route::get('/fieldworks', [HomeController::class, 'fieldworks'])->name('fieldworks');
Route::get('/job-details', [HomeController::class, 'jobDetails'])->name('job-details');
Route::get('/jobs', [HomeController::class, 'jobs'])->name('jobs');
