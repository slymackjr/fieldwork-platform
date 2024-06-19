<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\LogBook;
use App\Models\Student;
use App\Models\Employer;
use App\Models\Fieldwork;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{
    public function showLogin()
    {
        return view('student.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'studentEmail' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('student')->attempt(['studentEmail' => $credentials['studentEmail'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();

            // Retrieve the authenticated student
            $student = Auth::guard('student')->user();
            // Store the student ID and name in the session
            $request->session()->put('student_id', $student->studentID);
            $request->session()->put('user_type', 'student');
            $request->session()->put('student_name', $student->studentName);
            $request->session()->put('course', $student->course);
            // Check if any required fields are missing
            $incompleteProfile = $this->checkIncompleteProfile($student);
            $request->session()->put('incompleteProfile',  $incompleteProfile);

            return redirect()->intended(route('home'))->with('success', 'You are logged in!');
        }

        return back()->with(
            'error', 'The provided credentials do not match our records.',
        )->onlyInput('studentEmail');
    }

    public function logout(Request $request)
    {
         // Check if the student is logged in
         if (Auth::guard('student')->check()) {
            // Logout the student
            Auth::guard('student')->logout();

            // Unset session variables
            $request->session()->forget('user_type');
            $request->session()->forget('student_id');
            $request->session()->forget('student_name');
            $request->session()->forget('course');
            $request->session()->forget('incompleteProfile');

            // Destroy the session
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            // Redirect to the home page or any other page after logout
            return redirect()->route('home')->with('success', 'You have been logged out.');
        }

        // If user is not logged in, just redirect them to the home page
        return redirect()->route('home');
    }

    public function showRegister()
    {
        return view('student.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'studentName' => 'required|string|max:255',
            'registrationID' => 'required|string|max:255|unique:students',
            'studentEmail' => 'required|string|email|max:255|unique:students',
            'studentPhone' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
            'course' => 'required|string|max:255',
            'studyYear' => 'required|integer',
            'currentGPA' => 'required|numeric',
            'university' => 'required|string|max:255',
        ]);

        $student = Student::create([
            'studentName' => $request->studentName,
            'registrationID' => $request->registrationID,
            'studentEmail' => $request->studentEmail,
            'studentPhone' => $request->studentPhone,
            'password' => Hash::make($request->password),
            'course' => $request->course,
            'studyYear' => $request->studyYear,
            'currentGPA' => $request->currentGPA,
            'university' => $request->university,
        ]);

        Auth::guard('student')->login($student);
        $request->session()->regenerate();

        // Store the student ID and name in the session
        $request->session()->put('student_id', $student->studentID);
        $request->session()->put('user_type', 'student');
        $request->session()->put('student_name', $student->studentName);
        $request->session()->put('course', $student->course);
        // Check if any required fields are missing
        $incompleteProfile = $this->checkIncompleteProfile($student);
        $request->session()->put('incompleteProfile',  $incompleteProfile);

        return redirect()->route('home')->with('success', 'Registration successful.');
    }

        public function showHome()
    {
        // Fetch the authenticated student's ID from the session
        $studentId = session('student_id');

        $student = Student::findOrFail($studentId);
        $studentName = $student->studentName;
        $course = $student->course;

        // Check if any required fields are missing
        $incompleteProfile = $this->checkIncompleteProfile($student);

        // Fetch and count the different statuses for the authenticated student
        $totalApplications = Fieldwork::where('studentID', $studentId)->count();
        $acceptedApplications = Fieldwork::where('studentID', $studentId)->where('status', 'accepted')->count();
        $rejectedApplications = Fieldwork::where('studentID', $studentId)->where('status', 'rejected')->count();
        $pendingApplications = Fieldwork::where('studentID', $studentId)->where('status', 'pending')->count();

        // Fetch fieldwork data for the authenticated student and join with employers
        $fieldworks = Fieldwork::where('studentID', $studentId)
            ->join('employers', 'fieldworks.employerID', '=', 'employers.employerID')
            ->select('fieldworks.*', 'employers.companyName', 'employers.fieldworkTitle','employers.applicationDeadline')
            ->get();

        // Check if there is at least one fieldwork that meets the criteria
        $deadlineNotPassed = $this->deadlineNotPassed($studentId);

        return view('student.index', compact('fieldworks', 'totalApplications', 'acceptedApplications', 'rejectedApplications', 'pendingApplications','studentName','course','incompleteProfile','deadlineNotPassed'));
    }

    private function deadlineNotPassed($studentId)
    {
        // Check if there is at least one fieldwork that meets the criteria
        return Fieldwork::where('studentID', $studentId)
            ->where('confirmed', 'yes')
            ->where('status', 'accepted')
            ->with('employer')
            ->get()
            ->contains(function ($fieldwork) {
                return $fieldwork->meetsCriteria();
            });
    }


    private function checkIncompleteProfile($student)
    {
        $requiredFields = ['studentName', 'registrationID', 'studentEmail', 'studentPhone', 'password', 'course', 'studyYear', 'currentGPA', 'introductionLetter', 'resultSlip', 'university','universityLogo'
        ];

        foreach ($requiredFields as $field) {
            if (empty($student->$field)) {
                return true;
            }
        }

        return false; // Profile is complete
    }

    public function showLogBook(Request $request)
    {
        // Retrieve the student ID from the session
        $studentId = session('student_id');
        // Check if there is at least one fieldwork that meets the criteria
        $deadlineNotPassed = $this->deadlineNotPassed($studentId);
        if (!$deadlineNotPassed) {
            return redirect()->back();
        }
    
        // Check if selectedDay is provided in the request, otherwise use the value in the session or default to 1
        $selectedDay = $request->input('selectedDay', session('day', 1));
    
        // Store the selectedDay value in the session
        session()->put('day', $selectedDay);
    
        // Retrieve the student's data using the student ID
        $student = Student::findOrFail($studentId);
        $studentName = $student->studentName;
        $course = $student->course;
    
        // Check if any required fields are missing
        $incompleteProfile = $this->checkIncompleteProfile($student);

        $fieldwork = Fieldwork::where('studentID', $studentId)
        ->where('status', 'accepted')
        ->where('confirmed', 'yes')
        ->first();
    
        // Fetch all log book entries for the student
        $logBooks = LogBook::where('studentID', $studentId)
                            ->where('employerID', $fieldwork->employerID)
                            ->first();
    
        // Pass the log book data and selected day to the view
        return view('student.log-book', compact('studentName', 'course', 'selectedDay', 'logBooks'));
    }


    public function selectDay(Request $request)
    {
        // Retrieve and update the selected day in session
        $selectedDay = $request->input('selectedDay');
        $request->session()->put('selectedDay', $selectedDay);

        // Redirect back to the log book page
        return redirect()->route('log-book');
    }

    public function saveLog(Request $request)
    {

        // Retrieve selected day and log from the form submission
        $selectedDay = $request->input('selectedDay');
        $log = $request->input('log');
        $logID = $request->input('logID');

        // Retrieve the log book entry for the selected day
        $logBook = LogBook::findOrFail($logID);

        // Update or create the log for the selected day
        $logBook->{"day_$selectedDay"} = $log;
        $logBook->save();

        // Redirect back to the log book page
        return redirect()->route('log-book');
    }

    public function showStudentProfile()
    {
       // Retrieve the student ID from the session
       $studentId = session('student_id');

       // Retrieve the student's data using the student ID
       $student = Student::findOrFail($studentId);
       $studentName = $student->studentName;
       $course = $student->course;

        // Check if any required fields are missing
        $incompleteProfile = $this->checkIncompleteProfile($student);
         // Check if there is at least one fieldwork that meets the criteria
         $deadlineNotPassed = $this->deadlineNotPassed($studentId);

       // Check if the student exists
       if (!$student) {
        return redirect('/student-login')->withErrors(['error' => 'Student not found.']);
       }

       return view('student.profile', compact('student','studentName','course','incompleteProfile','deadlineNotPassed'));
    }

    // Update Student Profile
    public function updateStudentProfile(Request $request)
{
    // Retrieve the student ID from the session
    $studentId = $request->session()->get('student_id');

    // Retrieve the student's data using the student ID
    $student = Student::findOrFail($studentId);

    // Validate the request data
    $validated = $request->validate([
        'studentName' => 'required|string|max:255',
        'registrationID' => 'required|string|max:255',
        'studentEmail' => 'required|email|max:255',
        'studentPhone' => 'required|string|max:255',
        'course' => 'required|string|max:255',
        'studyYear' => 'required|integer',
        'currentGPA' => 'required|numeric',
        'introductionLetter' => 'nullable|file|mimes:pdf',
        'resultSlip' => 'nullable|file|mimes:pdf',
        'universityLogo' => 'nullable|file|mimes:jpeg,png,jpg',
    ]);

    // Update the student's data
    $student->update($validated);

    // Handle file uploads
    if ($request->hasFile('introductionLetter')) {
        $introductionLetterPath = $request->file('introductionLetter')->store('students', 'public');
        $student->introductionLetter = $introductionLetterPath;
    }
    
    if ($request->hasFile('resultSlip')) {
        $resultSlipPath = $request->file('resultSlip')->store('students', 'public');
        $student->resultSlip = $resultSlipPath;
    }

    // Validate and handle university Logo upload
    if ($request->hasFile('universityLogo')) {
        $this->validateImage($request->file('universityLogo'));

        // Delete the old universityLogo if it exists
        if ($student->universityLogo) {
            Storage::disk('public')->delete($student->universityLogo);
        }

        // Store the new universityLogo
        $universityLogoPath = $request->file('universityLogo')->store('student/universityLogos', 'public');
        $student->universityLogo = $universityLogoPath;
    }

    // Save changes to the student model
    $student->save();
    // Check if any required fields are missing
    $incompleteProfile = $this->checkIncompleteProfile($student);

    if (!$incompleteProfile) {
        session()->put('incompleteProfile', false);
    } else {
        session()->put('incompleteProfile', true); // Set to true if the profile is incomplete
    }


    return redirect()->route('student-profile')->with('success', 'Profile updated successfully.')->with('message_type', 'success');
}

    private function validateImage($image)
    {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif','image/jpg'];
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

    public function download($path)
    {
        // Sanitize the path to avoid directory traversal attacks
    

        if (!Storage::disk('public')->exists($path)) {
            abort(404, 'File not found.');
        }

        $file = Storage::disk('public')->path($path);

        return response()->download($file);
    }
    

     // Change Student Password
    public function changePassword(Request $request)
    {
        // Retrieve the student ID from the session
        $studentId = $request->session()->get('student_id');

        // Retrieve the student's data using the student ID
        $student = Student::findOrFail($studentId);

        // Check if the student exists
        if (!$student) {
            return redirect('/student-login')->withErrors(['error' => 'Student not found.']);
        }

        // Validate the request data
        $validated = $request->validate([
            'currentPassword' => 'required|string|min:8',
            'newPassword' => 'required|string|min:8|confirmed',
        ]);

        // Check if the current password matches
        if (!Hash::check($validated['currentPassword'], $student->password)) {
            return back()->withErrors(['error' => 'Current password is incorrect.'])->withInput();
        }

        // Update the password
        $student->password = Hash::make($validated['newPassword']);
        $student->save();

        return redirect()->route('student-profile')->with('success', 'Password changed successfully.')->with('message_type', 'success');
    }

    public function confirmApplication(Request $request)
    {
        // Retrieve the fieldwork ID from the request
        $fieldworkId = $request->fieldworkID;
        $employerId = $request->employerID;
        
        // Find the fieldwork by its ID
        $application = Fieldwork::findOrFail($fieldworkId);
    
        // Check if the application is being confirmed or canceled
        if ($request->confirmed === 'yes') {
            // Update the confirmed field to 'yes'
            $application->confirmed = 'yes';
            $message = 'Application confirmed successfully.';
            // Create a new LogBook entry
            LogBook::create([
                'employerID' => $employerId,
                'studentID' => $application->studentID,
                'status' => 'confirmed', // You can set a default status or adjust as needed
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        } else {
            // Update the confirmed field to 'no'
            $application->confirmed = 'no';
            $message = 'Application canceled successfully.';
            // Delete the existing LogBook entry if it exists
            LogBook::where('employerID', $employerId)
            ->where('studentID', $application->studentID)
            ->delete();
        }
    
        // Save the changes to the application
        $application->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', $message);
    }

    public function generateReport(Request $request)
    {
        $logID = $request->logID;
        $logBook = LogBook::findOrFail($logID); // Retrieve a single log book instance
        $studentID = $logBook->studentID;
        $employerID = $logBook->employerID;

        $student = Student::findOrFail($studentID);
        $employer = Employer::findOrFail($employerID);

        $attendance = Attendance::where('studentID', $studentID)
            ->where('employerID', $employerID)
            ->first();
        $attendedDays = 0;
        $attended = [];
        for ($day = 1; $day <= 40; $day++) {
            $dayField = 'day_' . $day;
                $attended[$day] = $attendance->$dayField;
                if ($attendance->$dayField === 'present') {
                    # code...
                    $attendedDays++; // Increment counter if day is 'present'

                }
        }
        
        // Create an array to hold log data for each day
        $logs = [];
        for ($day = 1; $day <= 40; $day++) {
            $dayField = 'day_' . $day;
                $logs[$day] = $logBook->$dayField;
        }

        $pdf = PDF::loadView('reports.logBook', compact('student', 'employer', 'logs', 'attended','attendedDays'));

        $fileName = 'logbook_report' . '.pdf';

        return $pdf->download($fileName);
    }
    

}
