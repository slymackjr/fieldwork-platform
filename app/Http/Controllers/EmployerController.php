<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use Illuminate\Http\Request;
use App\Models\EmployerModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function register(Request $request)
    {
        $request->validate([
            'companyName' => 'required|string|max:255',
            'officeID' => 'required|string|max:255|unique:employers',
            'supervisorName' => 'required|string|max:255',
            'supervisorPhone' => 'required|string|max:255',
            'supervisorEmail' => 'required|string|email|max:255|unique:employers',
            'supervisorPassword' => 'required|string|min:8|confirmed',
            'supervisorPosition' => 'required|string|max:255',
            'supervisorSignature' => 'required|string|max:255',
            'Muhuri' => 'required|string|max:255',
            'fieldworkTitle' => 'required|string|max:255',
            'fieldworkDescription' => 'required|string|max:255',
        ]);

        $employer = Employer::create([
            'companyName' => $request->companyName,
            'officeID' => $request->officeID,
            'supervisorName' => $request->supervisorName,
            'supervisorPhone' => $request->supervisorPhone,
            'supervisorEmail' => $request->supervisorEmail,
            'supervisorPassword' => Hash::make($request->supervisorPassword),
            'supervisorPosition' => $request->supervisorPosition,
            'supervisorSignature' => $request->supervisorSignature,
            'Muhuri' => $request->Muhuri,
            'fieldworkTitle' => $request->fieldworkTitle,
            'fieldworkDescription' => $request->fieldworkDescription,
        ]);

        Auth::guard('employer')->login($employer);

        return redirect()->route('home')->with('success', 'Registration successful.');
    }

    public function showHome()
    {
        return view('admin.index');
    }
    public function login(Request $request)
    {
        // Validate the form data
        $credentials = $request->validate([
            'supervisorEmail' => ['required', 'email'],
            'supervisorPassword' => ['required'],
        ]);
    
        // Attempt to authenticate the employer
        if (Auth::guard('employer')->attempt(['supervisorEmail' => $credentials['supervisorEmail'], 'password' => $credentials['supervisorPassword']])) {
            // If successful, regenerate the session and redirect to intended location
            $request->session()->regenerate();
    
            return redirect()->intended(route('dashboard'))->with('success', 'You are logged in!');
        }
    
        // If unsuccessful, redirect back with error message
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($request->only('email', 'remember'));
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
