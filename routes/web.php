<?php

use App\Http\Controllers\EmployerController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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
Route::get('/student-login', function () {return view('student.login');})->name('student-login');
Route::get('/student-register', function () {return view('student.register');})->name('student-register');
Route::get('/student-home', function () {return view('student.home');})->name('student-dashboard');

/*----------------------------------------------------------------------------
#admin section
------------------------------------------------------------------------------*/
Route::get('/login', function () {return view('admin.login');})->name('login');
Route::post('/login', [EmployerController::class, 'login'])->name('login-employer-method');
Route::get('/register', function () {return view('admin.register');})->name('register');
Route::get('/home', function () {return view('admin.home');})->name('dashboard');

/*----------------------------------------------------------------------------
#home section
------------------------------------------------------------------------------*/
Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('/blog', function () {return view('blog');})->name('blog');
Route::get('/candidate', function () {return view('candidate');})->name('candidate');
Route::get('/contact', function () {return view('contact');})->name('contact');
Route::get('/elements', function () {return view('elements');})->name('elements');
Route::get('/fieldwork-details', function () {return view('fieldwork_details');})->name('fieldwork-details');
Route::get('/fieldworks', function () {return view('fieldworks');})->name('fieldworks');
Route::get('/job-details', function () {return view('job_details');})->name('job-details');
Route::get('/jobs', function () {return view('jobs');})->name('jobs');
Route::get('/single-blog', function () {return view('single-blog');})->name('single-blog');
