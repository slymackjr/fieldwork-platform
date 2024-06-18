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
Route::middleware(['student'])->group(function () {
    Route::get('/student-dashboard', [StudentController::class, 'showHome'])->name('student-dashboard');
    Route::post('/student-dashboard', [StudentController::class, 'confirmApplication'])->name('confirm.application');
    Route::get('/log-book', [StudentController::class, 'showLogBook'])->name('log-book');
    Route::post('/log-book', [StudentController::class, 'saveLog'])->name('log-book.saveLog');
    Route::get('/student-profile', [StudentController::class, 'showStudentProfile'])->name('student-profile');
    Route::post('/student-profile', [StudentController::class, 'updateStudentProfile'])->name('student-profile-update');
    Route::post('/student-change-password', [StudentController::class, 'changePassword'])->name('student-change-password');
    Route::get('/download/{path}', [StudentController::class, 'download'])->name('pdf.download')->where('path', '.*');
    Route::post('/generate-report', [StudentController::class, 'generateReport'])->name('generateReport');
    //Route::get('/report', [StudentController::class, 'report'])->name('generateReport');
    Route::get('/test', [StudentController::class, 'testView'])->name('test.view');
    Route::get('/student-logout', [StudentController::class, 'logout'])->name('student-logout');
});



/*----------------------------------------------------------------------------
#admin section
------------------------------------------------------------------------------*/
Route::get('/login', [EmployerController::class, 'showLogin'])->name('login');
Route::post('/login', [EmployerController::class, 'login'])->name('login-employer');
Route::get('/register', [EmployerController::class, 'showRegister'])->name('register');
Route::post('/register', [EmployerController::class, 'register'])->name('register-employer');
Route::middleware(['employer'])->group(function () {
    Route::get('/dashboard', [EmployerController::class, 'showHome'])->name('dashboard'); 
    Route::post('/dashboard', [EmployerController::class, 'updateStatus'])->name('admin.updateStatus');
    Route::get('/attendance', [EmployerController::class, 'showAttendance'])->name('attendance.show');
    Route::post('/attendance', [EmployerController::class, 'submitAttendance'])->name('attendance.save');
    Route::get('/applicant-attendance', [EmployerController::class, 'showApplicantAttendance'])->name('applicant-attendance');
    Route::get('/post', [EmployerController::class, 'showPost'])->name('post');
    Route::get('/post-edit', [EmployerController::class, 'editPost'])->name('fieldwork-post.edit');
    Route::post('/post-edit', [EmployerController::class, 'updatePost'])->name('fieldwork-post.update');
    Route::get('/profile', [EmployerController::class, 'showUsersProfile'])->name('profile');
    Route::post('/profile/update', [EmployerController::class, 'updateProfile'])->name('employer.profile.update');
    Route::post('/profile/password', [EmployerController::class, 'changePassword'])->name('employer.password.update');
    Route::get('/confirm-applications', [EmployerController::class, 'showConfirmApplications'])->name('confirm-applications');
    Route::get('/applicant', [EmployerController::class, 'showApplicant'])->name('applicant');
    Route::get('/logout', [EmployerController::class, 'logout'])->name('logout');   
});


/*----------------------------------------------------------------------------
#home section
------------------------------------------------------------------------------*/
Route::get('/', [HomeController::class,'index'])->name('home');
Route::post('/apply', [HomeController::class, 'applyField'])->name('apply');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::get('/fieldwork-details/{employerID}', [HomeController::class, 'fieldworkDetails'])->name('fieldwork-details');   

