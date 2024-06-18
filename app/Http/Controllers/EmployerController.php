<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Employer;
use App\Models\Fieldwork;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

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
    //To view the log information check storage/logs/laravel.log directory of your Laravel project.
    //Log::info('Register method called');
    $request->validate([
        'companyName' => 'required|string|max:255',
        'supervisorEmail' => [
            'required',
            'string',
            'email',
            'max:255',
            'unique:employers',
            'regex:/[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$/'
        ],
        'supervisorName' => 'required|string|max:255',
        'password' => [
            'required',
            'string',
            'min:8',
            'regex:/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/'
        ],
    ], [
        'password.regex' => 'Password must be at least 8 characters long and include 1 uppercase letter, 1 lowercase letter, 1 digit, 1 special character.',
        'supervisorEmail.regex' => 'Supervisor email must be a valid email address.',
    ]);
    
    $employer = Employer::create([
        'companyName' => $request->companyName,
        'supervisorEmail' => $request->supervisorEmail,
        'supervisorName' => $request->supervisorName,
        'password' => Hash::make($request->password),
    ]);

    Auth::guard('employer')->login($employer);

    // Regenerate the session to prevent session fixation
    $request->session()->regenerate();

     // Store the employer ID and name in the session
     $request->session()->put('employer_id', $employer->employerID);
     $request->session()->put('user_type', 'employer');
     $request->session()->put('employer_name', $employer->supervisorName);
     $request->session()->put('employer_company', $employer->companyName);

    return redirect()->route('dashboard')->with('success', 'Registration successful.');
}


    public function showHome()
{
     // Inside any method or function in your Laravel application
    //Debugbar::info(now()->format('Y-m-d H:i:s'));
    $employer = Employer::findOrFail(session('employer_id'));
    $deadline = $employer->hasPassedDeadline();
    $employerName = $employer->supervisorName;
    $employerCompany = $employer->companyName;
    $fieldworks = Fieldwork::where('employerID', session('employer_id'))->with('student')->get();
    $confirmedFieldworks = Fieldwork::where('employerID', session('employer_id'))
    ->where('confirmed', 'yes')
    ->where('status', 'accepted')
    ->with('student')
    ->get();
    // Check if any required fields are missing
    $incompleteProfile = $this->checkIncompleteProfile($employer);

    // Fetching the count of rejected, pending, and accepted students for the employer with ID
    $notConfirmedCount = Fieldwork::where('employerID', session('employer_id'))->where('status', 'accepted')->where('confirmed', 'no')->count();
    $confirmedCount = Fieldwork::where('employerID', session('employer_id'))->where('status', 'accepted')->where('confirmed', 'yes')->count();
    $acceptedCount = Fieldwork::where('employerID', session('employer_id'))->where('status', 'accepted')->count();
    $rejectedCount = Fieldwork::where('employerID', session('employer_id'))->where('status', 'rejected')->count();
    $pendingCount = Fieldwork::where('employerID', session('employer_id'))->where('status', 'pending')->count();

    return view('admin.index', compact('fieldworks','confirmedFieldworks','deadline','employerName','employerCompany','confirmedCount', 'notConfirmedCount', 'acceptedCount','rejectedCount','pendingCount', 'incompleteProfile'));
}

    private function checkIncompleteProfile($employer)
    {
        $requiredFields = [
            'companyName','location', 'officeID', 'supervisorName', 'supervisorPhone', 'supervisorEmail', 
            'password', 'supervisorPosition', 'supervisorSignature', 'Muhuri', 'companyLogo', 
             'TIN'
        ];

        foreach ($requiredFields as $field) {
            if (empty($employer->$field)) {
                return true;
            }
        }

        return false; // Profile is complete
    }

    private function profileComplete($employer)
    {
        $requiredFields = [
            'companyName','location', 'officeID', 'supervisorName', 'supervisorPhone', 'supervisorEmail', 
            'password', 'supervisorPosition', 'supervisorSignature', 'Muhuri', 'companyLogo', 
             'fieldworkTitle', 'fieldworkDescription', 'applicationDeadline', 'TIN'
        ];

        foreach ($requiredFields as $field) {
            if (empty($employer->$field)) {
                return true;
            }
        }

        return false; // Profile is complete
    }


    public function updateStatus(Request $request)
    {
        $fieldworkID = $request->fieldworkID;
        $status = $request->status;
        $fieldwork = Fieldwork::find($fieldworkID);
    
        if ($fieldwork) {
            $fieldwork->status = $status;
            $fieldwork->save();
    
            if ($status === 'accepted') {
                $employerID = $fieldwork->employerID;
                $studentID = $fieldwork->studentID;
    
                // Create attendance if not already exists
                Attendance::firstOrCreate([
                    'employerID' => $employerID,
                    'studentID' => $studentID,
                ]);
            } elseif ($status === 'rejected') {
                // Delete attendance if exists
                Attendance::where('employerID', $fieldwork->employerID)
                          ->where('studentID', $fieldwork->studentID)
                          ->delete();
            }
        }
    
        return redirect()->route('dashboard');
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

            // Retrieve the authenticated employer
            $employer = Auth::guard('employer')->user();
            // Store the employer ID and name in the session
            $request->session()->put('employer_id', $employer->employerID);
            $request->session()->put('user_type', 'employer');
            $request->session()->put('employer_name', $employer->supervisorName);
            $request->session()->put('employer_company', $employer->companyName);
    
            return redirect()->intended(route('dashboard'))->with('success', 'You are logged in!');
        }
    
        // If unsuccessful, redirect back with error message
        return back()->with('error', 'The provided credentials do not match our records.');
    }
    
    public function logout(Request $request)
    {
         // Check if the employer is logged in
         if (Auth::guard('employer')->check()) {
            // Logout the employer
            Auth::guard('employer')->logout();

            // Unset session variables
            $request->session()->forget('user_type');
            $request->session()->forget('employer_id');
            $request->session()->forget('employer_name');
            $request->session()->forget('employer_company');

            // Destroy the session
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Redirect to the home page or any other page after logout
            return redirect()->route('home')->with('success', 'You have been logged out.');
        }

        // If user is not logged in, just redirect them to the home page
        return redirect()->route('home');
    }

    public function showAttendance(Request $request)
    {
        $employerID = session('employer_id');
        $studentID = $request->studentID;
        $employer = Employer::findOrFail($employerID);
        $deadline = $employer->hasPassedDeadline();
        if(!$deadline)
        {
            if (empty($studentID)) {
                return redirect()->back();
            }
            return redirect()->back();
        }
        $employerName = $employer->supervisorName;
        $employerCompany = $employer->companyName;

        // expect the record to exist, If the record is not found, a 404 response is automatically returned 
        $student = Student::findOrFail($studentID);
        $studentName = $student->studentName;
        // Fetch attendance data for the given student ID and employer ID 1
        $attendance = Attendance::where('studentID', $studentID)->where('employerID', $employerID)->first();


        // Pass the data to the view
        return view('admin.attendance', compact('studentID','studentName', 'attendance','employerName','employerCompany'));
    }

    public function submitAttendance(Request $request)
    {
        // Validate the request
        $request->validate([
            'studentID' => 'required|integer|exists:students,studentID',
        ]);

        $studentID = $request->input('studentID');

        // Fetch or create the attendance record
        $attendance = Attendance::updateOrCreate(
            ['studentID' => $studentID, 'employerID' => 1],
            $request->except(['_token'])
        );

        // Redirect back to the attendance page with a success message
        return redirect()->route('attendance.show', ['studentID' => $studentID])->with('success', 'Attendance updated successfully!');
    }

    public function showApplicantAttendance()
    {
        $employerID = session('employer_id');
        $employer = Employer::findOrFail($employerID);
        $employerName = $employer->supervisorName;
        $employerCompany = $employer->companyName;
        $deadline = $employer->hasPassedDeadline();
        if(!$deadline)
        {
            return redirect()->back();
        }
        // Fetch all fieldworks for the given employer
        $fieldworks = Fieldwork::where('employerID', $employerID)
        ->where('confirmed', 'yes')
        ->where('status', 'accepted')
        ->with('student')
        ->get();

        // Check if any required fields are missing
        $incompleteProfile = $this->checkIncompleteProfile($employer);

        return view('admin.applicant-attendance', compact('fieldworks','employerName','employerCompany','incompleteProfile'));
    }


    public function showPost()
    {
        $employerID = session('employer_id');
        $employer = Employer::findOrFail($employerID);
        $employerName = $employer->supervisorName;
        $employerCompany = $employer->companyName;
        $deadline = $employer->hasPassedDeadline();
        // Check if anll required fields are filled
        $profileComplete = $this->profileComplete($employer);
        if($profileComplete)
        {
            return redirect()->back();
        }
         // Check if any required fields are missing
        $incompleteProfile = $this->checkIncompleteProfile($employer);
        // Return the view with the fetched data
        return view('admin.fieldwork-post', compact('employer','employerName','employerCompany','deadline','incompleteProfile'));
    }

    public function editPost()
    {

        $employerID = session('employer_id');
        $employer = Employer::findOrFail($employerID);
        $deadline = $employer->hasPassedDeadline();
        $employerName = $employer->supervisorName;
        $employerCompany = $employer->companyName;
        // Check if any required fields are missing
        $incompleteProfile = $this->checkIncompleteProfile($employer);
        if($incompleteProfile)
        {
            return redirect()->back();
        }

        return view('admin.fieldwork-post-edit', compact('employer','employerName','employerCompany','deadline','incompleteProfile'));
    }

    public function updatePost(Request $request)
    {
        // Validate the incoming request data
    $validator = Validator::make($request->all(), [
        'fieldworkTitle' => 'required|string|max:255',
        'fieldworkDescription' => 'required|string',
        'applicationDeadline' => 'required|date', // Ensure applicationDeadline is a valid date
    ]);

    // If validation fails, redirect back with errors
    if ($validator->fails()) {
        return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
    }

        $employerID = session('employer_id');
        $employer = Employer::findOrFail($employerID);
        $employer->update($request->all());

        return redirect()->route('fieldwork-post.edit')->with('success', 'Fieldwork post updated successfully.');
    }

    public function showUsersProfile()
    {
        $employerID = session('employer_id');
        $employer = Employer::findOrFail($employerID);
        $deadline = $employer->hasPassedDeadline();
        $employerName = $employer->supervisorName;
        $employerCompany = $employer->companyName;

        // Check if any required fields are missing
        $incompleteProfile = $this->checkIncompleteProfile($employer);

        $employer = Employer::withCount([
            'fieldworks as accepted_count' => function ($query) {
                $query->where('status', 'accepted');
            },
            'fieldworks as pending_count' => function ($query) {
                $query->where('status', 'pending');
            },
            'fieldworks as rejected_count' => function ($query) {
                $query->where('status', 'rejected');
            },
        ])->findOrFail($employerID);

        return view('admin.users-profile', compact('employer', 'employerName', 'employerCompany','incompleteProfile','deadline'));
    }

    public function updateProfile(Request $request)
    {
        $employerID = session('employer_id');
        $employer = Employer::findOrFail($employerID);

        // Validate image files
        if ($request->hasFile('supervisorSignature')) {
            $this->validateImage($request->file('supervisorSignature'));
        }

        if ($request->hasFile('CompanyLogo')) {
            $this->validateImage($request->file('CompanyLogo'));
        }

        if ($request->hasFile('Muhuri')) {
            $this->validateImage($request->file('Muhuri'));
        }

        // Update basic info
        $employer->update($request->all());

        // Handle Supervisor Signature upload
        if ($request->hasFile('supervisorSignature')) {
            // Delete the old signature if it exists
            if ($employer->supervisorSignature) {
                Storage::disk('public')->delete($employer->supervisorSignature);
            }
            // Store the new signature
            $signaturePath = $request->file('supervisorSignature')->store('employer/signatures', 'public');
            $employer->supervisorSignature = $signaturePath;
        }

        // Handle Muhuri upload
        if ($request->hasFile('Muhuri')) {
            // Delete the old Muhuri if it exists
            if ($employer->Muhuri) {
                Storage::disk('public')->delete($employer->Muhuri);
            }
            // Store the new Muhuri
            $muhuriPath = $request->file('Muhuri')->store('employer/muhuris', 'public');
            $employer->Muhuri = $muhuriPath;
        }

        // Handle Company Logo upload
        if ($request->hasFile('CompanyLogo')) {
            // Delete the old Company Logo if it exists
            if ($employer->CompanyLogo) {
                Storage::disk('public')->delete($employer->CompanyLogo);
            }
            // Store the new Company Logo
            $CompanyLogoPath = $request->file('CompanyLogo')->store('employer/CompanyLogos', 'public');
            $employer->CompanyLogo = $CompanyLogoPath;
        }

        $employer->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    private function validateImage($image)
    {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/jpg'];
        $maxWidth = 300;

        $imageMimeType = $image->getMimeType();
        $imageSize = getimagesize($image);

        if (!in_array($imageMimeType, $allowedMimeTypes)) {
            throw ValidationException::withMessages([
                'image' => 'Only JPEG, PNG, JPG and GIF images are allowed.'
            ]);
        }

        if ($imageSize[0] != $maxWidth) {
            throw ValidationException::withMessages([
                'image' => 'Image dimensions must be 300 pixels wide.'
            ]);
        }
    }

    public function changePassword(Request $request)
{
    $request->validate([
        'currentPassword' => 'required',
        'newPassword' => [
            'required',
            'string',
            'min:8',
            'regex:/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/'
        ],
        'renewPassword' => 'required|same:newPassword',
    ], [
        'newPassword.regex' => 'Password must be at least 8 characters long and include 1 uppercase letter, 1 lowercase letter, 1 digit, and 1 special character.',
        'renewPassword.same' => 'The new passwords do not match.',
    ]);

    $employerID = session('employer_id');
    $employer = Employer::findOrFail($employerID);

    if (!Hash::check($request->currentPassword, $employer->password)) {
        return redirect()->back()->with('error', 'Current password does not match.');
    }

    $employer->password = Hash::make($request->newPassword);
    $employer->save();

    return redirect()->route('profile')->with('success', 'Password changed successfully.');
}


}
