<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployerModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class EmployerController extends Controller
{
    public function showLogin()
    {
        return view('admin.login');
    }

    public function showRegister()
    {
        return view('admin.register');
    }

    public function showHome()
    {
        return view('admin.index');
    }

    /* public function login(Request $request): RedirectResponse
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $employer = new EmployerModel();
        $success = $employer->loginEmployer($email, $password);

        // Handle redirection based on success or failure
        if ($success) {
            // Login successful
            session()->flash('success', 'Welcome back.');
            return redirect()->route('dashboard');
        } else {
            // Login failed
            return redirect()->route('login')->with('error', 'Incorrect email or password');
        }
    } */

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt to log the employer in
        if (Auth::guard('employer')->attempt(['supervisorEmail' => $request->email, 'password' => $request->password], $request->remember)) {
            // If successful, then redirect to their intended location
            return redirect()->intended(route('employer.dashboard'));
        }

        // If unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors(['email' => 'These credentials do not match our records.']);
    }

    /**
     * Log the employer out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::guard('employer')->logout();
        return redirect('/');
    }

    public function showAttendance()
    {
        return view('admin.attendance');
    }

    public function showApplicantAttendance()
    {
        return view('admin.applicant-attendance');
    }


    public function showPost()
    {
        return view('admin.fieldwork-post');
    }

    public function showUsersProfile()
    {
        return view('admin.users-profile');
    }

    public function showConfirmApplications()
    {
        return view('admin.confirm-applications');
    }

    public function showApplicant()
    {
        return view('admin.applicant');
    }
}
