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

/*----------------------------------------------------------------------------
#student section
------------------------------------------------------------------------------*/
Route::get('/student-register', [StudentController::class, 'showRegister'])->name('student-register');
Route::post('/student-register', [StudentController::class, 'register'])->name('student-register-post');
Route::get('/student-login', [StudentController::class, 'showLogin'])->name('student-login');
Route::post('/student-login', [StudentController::class, 'login'])->name('student-login-post');
Route::post('/student-logout', [StudentController::class, 'logout'])->name('student-logout');   
Route::middleware(['student'])->group(function () {
    Route::get('/student-home', [StudentController::class, 'showHome'])->name('student-dashboard');
    Route::get('/log-book', [StudentController::class, 'showLogBook'])->name('log-book');
    Route::post('/log-book/day/{selectedDay}', [StudentController::class, 'saveLog'])->name('log-book.saveLog');
    Route::post('/log-book/select-day', [StudentController::class, 'selectDay'])->name('log-book.selectDay');
    Route::get('/student-profile', [StudentController::class, 'showStudentProfile'])->name('student-profile');
    Route::post('/student-profile', [StudentController::class, 'updateStudentProfile'])->name('student-profile-update');
    Route::post('/student-change-password', [StudentController::class, 'changePassword'])->name('student-change-password');
    Route::post('/student-home', [StudentController::class, 'confirmApplication'])->name('confirm.application');
    Route::get('/pdf/download/{path}', [StudentController::class, 'download'])->name('pdf.download')->where('path', '.*');

});



/*----------------------------------------------------------------------------
#admin section
------------------------------------------------------------------------------*/
Route::get('/login', [EmployerController::class, 'showLogin'])->name('login');
Route::post('/login', [EmployerController::class, 'login'])->name('login-employer');
Route::get('/register', [EmployerController::class, 'showRegister'])->name('register');
Route::post('/register', [EmployerController::class, 'register'])->name('register-employer');
Route::middleware(['employer'])->group(function () {
    Route::get('/home', [EmployerController::class, 'showHome'])->name('dashboard'); 
    Route::get('/attendance', [EmployerController::class, 'showAttendance'])->name('attendance');
    Route::get('/applicant-attendance', [EmployerController::class, 'showApplicantAttendance'])->name('applicant-attendance');
    Route::get('/post', [EmployerController::class, 'showPost'])->name('post');
    Route::get('/profile', [EmployerController::class, 'showUsersProfile'])->name('profile');
    Route::get('/confirm-applications', [EmployerController::class, 'showConfirmApplications'])->name('confirm-applications');
    Route::get('/applicant', [EmployerController::class, 'showApplicant'])->name('applicant');
});


/*----------------------------------------------------------------------------
#home section
------------------------------------------------------------------------------*/
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/fieldwork-details', [HomeController::class, 'fieldworkDetails'])->name('fieldwork-details');
Route::get('/fieldworks', [HomeController::class, 'fieldworks'])->name('fieldworks');
Route::get('/job-details', [HomeController::class, 'jobDetails'])->name('job-details');
Route::get('/jobs', [HomeController::class, 'jobs'])->name('jobs');
