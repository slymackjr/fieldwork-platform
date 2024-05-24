<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function showLogin()
    {
        return view('student.login');
    }

    public function showRegister()
    {
        return view('student.register');
    }

    public function showHome()
    {
        return view('student.index');
    }

    public function showLogBook()
    {
        return view('student.log-book');
    }

    public function showStudentProfile()
    {
        return view('student.profile');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->intended(route('student.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['email' => 'These credentials do not match our records.']);
    }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();
        return redirect('/');
    }
}
