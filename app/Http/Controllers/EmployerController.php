<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Employer;
use App\Models\Fieldwork;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

    // Fetch the newly created employer's ID
    $employerID = $employer->employerID;

    // Create attendance for the newly registered employer
    $attendance = Attendance::create([
        'employerID' => $employerID,
    ]);

    Auth::guard('employer')->login($employer);

    return redirect()->route('dashboard')->with('success', 'Registration successful.');
}


    public function showHome()
{
    $employer = Employer::findOrFail(session('employer_id'));
    $employerName = $employer->supervisorName;
    $employerCompany = $employer->companyName;
    $fieldworks = Fieldwork::where('employerID', session('employer_id'))->with('student')->get();

    // Check if any required fields are missing
    $incompleteProfile = $this->checkIncompleteProfile($employer);

    // Fetching the count of rejected, pending, and accepted students for the employer with ID
    $rejectedCount = Fieldwork::where('employerID', session('employer_id'))->where('status', 'rejected')->count();
    $pendingCount = Fieldwork::where('employerID', session('employer_id'))->where('status', 'pending')->count();
    $acceptedCount = Fieldwork::where('employerID', session('employer_id'))->where('status', 'accepted')->count();

    return view('admin.index', compact('fieldworks','employerName','employerCompany','rejectedCount', 'pendingCount', 'acceptedCount', 'incompleteProfile'));
}

private function checkIncompleteProfile($employer)
{
    $requiredFields = ['companyName', 'officeID', 'supervisorName', 'supervisorPhone', 'supervisorEmail', 'password', 'supervisorPosition', 'supervisorSignature', 'Muhuri', 'fieldworkTitle', 'fieldworkDescription','applicationDeadline','TIN'];

    foreach ($requiredFields as $field) {
        if (empty($employer->$field)) {
            return 'Please complete your profile information to post fieldworks.';
        }
    }

    return false; // Profile is complete
}


    public function updateStatus(Request $request)
    {
        $fieldworkID = $request->fieldworkID;
        $fieldwork = Fieldwork::find($fieldworkID);
        if ($fieldwork) {
            $fieldwork->status = $request->status;
            $fieldwork->save();
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
    
            return redirect()->intended(route('dashboard'))->with('success', 'You are logged in!');
        }
    
        // If unsuccessful, redirect back with error message
        return back()->with('error', 'The provided credentials do not match our records.');
    }
    
    public function logout()
    {
        Auth::guard('employer')->logout();
        return redirect()->route('login');
    }

    public function showAttendance(Request $request, $studentID)
    {
        $employerID = session('employer_id');
        $employer = Employer::findOrFail($employerID);
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

        // Fetch all fieldworks for the given employer
        $fieldworks = Fieldwork::where('employerID', $employerID)->with('student')->get();

        return view('admin.applicant-attendance', compact('fieldworks','employerName','employerCompany'));
    }


    public function showPost()
    {
        $employerID = session('employer_id');
        $employer = Employer::findOrFail($employerID);
        $employerName = $employer->supervisorName;
        $employerCompany = $employer->companyName;
        // Fetch the employer with employerID 1
        $employer = Employer::findOrFail($employerID);

        // Return the view with the fetched data
        return view('admin.fieldwork-post', compact('employer','employerName','employerCompany'));
    }

    public function editPost()
    {
        $employerID = session('employer_id');
        $employer = Employer::findOrFail($employerID);
        $employerName = $employer->supervisorName;
        $employerCompany = $employer->companyName;
        $employer = Employer::findOrFail($employerID);

        // Check if any required fields are missing
        $incompleteProfile = $this->checkIncompleteProfile($employer);

        return view('admin.fieldwork-post-edit', compact('employer','employerName','employerCompany','incompleteProfile'));
    }

    public function updatePost(Request $request)
    {
        $request->validate([
            'companyName' => 'required|string|max:255',
            'fieldworkTitle' => 'required|string|max:255',
            'fieldworkDescription' => 'required|string',
        ]);

        $employerID = session('employer_id');
        $employer = Employer::findOrFail($employerID);
        $employer->update($request->all());

        return redirect()->route('fieldwork-post.edit')->with('success', 'Fieldwork post updated successfully.');
    }

    public function showUsersProfile()
    {
        $employerID = session('employer_id');
        $employer = Employer::findOrFail($employerID);

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

        return view('admin.users-profile', compact('employer', 'employerName', 'employerCompany','incompleteProfile'));
    }

    public function updateProfile(Request $request)
    {
        $employerID = session('employer_id');
        $employer = Employer::findOrFail($employerID);

        // Validate image files
        if ($request->hasFile('supervisorSignature')) {
            $this->validateImage($request->file('supervisorSignature'));
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

        $employer->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    private function validateImage($image)
    {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $maxWidth = 300;

        $imageMimeType = $image->getMimeType();
        $imageSize = getimagesize($image);

        if (!in_array($imageMimeType, $allowedMimeTypes)) {
            throw ValidationException::withMessages([
                'image' => 'Only JPEG, PNG, and GIF images are allowed.'
            ]);
        }

        if ($imageSize[0] != $maxWidth) {
            throw ValidationException::withMessages([
                'image' => 'Image dimensions must be 300x150 pixels.'
            ]);
        }
    }

    public function changePassword(Request $request)
    {
        $employerID = session('employer_id');
        $employer = Employer::findOrFail($employerID);

        if (!Hash::check($request->currentPassword, $employer->password)) {
            return redirect()->back()->with('error', 'Current password does not match.');
        }

        if ($request->newpassword !== $request->renewpassword) {
            return redirect()->back()->with('error', 'New passwords do not match.');
        }

        $employer->password = Hash::make($request->newpassword);
        $employer->save();

        return redirect()->route('profile')->with('success', 'Password changed successfully.');
    }

}
