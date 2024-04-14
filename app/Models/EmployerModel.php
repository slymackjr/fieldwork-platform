<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EmployerModel extends Model
{
    use HasFactory;

    public function __construct() {
        
    }

    public function loginEmployer($email, $password): bool
    {
        // Use Eloquent model to retrieve the officer based on the email
        $user = Employer::where('email', $email)->first();
        if ($user !== null) {
                 // Attempt to authenticate using the 'staff' guard
                if (Auth::guard('employers')->attempt(['email' => $email, 'password' => $password])) {
                     // Authentication successful, store email in session
                     // Put the email into the session
                    Session::put('email', $email);
                    // Regenerate the session ID
                    Session::regenerate();
                    // Save the changes to the session
                    Session::save();
                    session()->flash('success', 'login successfully!.');
                    return true;
                } else {
                    session()->flash('error', 'login failed!.');
                    return false;
                }
        } else {
            session()->flash('error', 'not registered!.');
            return false;
        }

    }
}
