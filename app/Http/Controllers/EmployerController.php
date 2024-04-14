<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployerModel;
use Illuminate\Http\RedirectResponse;

class EmployerController extends Controller
{
    public function login(Request $request): RedirectResponse
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
    }
}
