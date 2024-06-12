<?php

namespace App\Http\Controllers;

use App\Models\LogBook;
use App\Models\Student;
use App\Models\Fieldwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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

            return redirect()->intended(route('student-dashboard'))->with('success', 'You are logged in!');
        }

        return back()->withErrors([
            'studentEmail' => 'The provided credentials do not match our records.',
        ])->onlyInput('studentEmail');
    }

    public function logout(Request $request)
    {
        Auth::guard('student')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('student-login'))->with('success', 'You are logged out!');
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

        return redirect()->route('student-dashboard')->with('success', 'Registration successful.');
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

    return view('student.index', compact('fieldworks', 'totalApplications', 'acceptedApplications', 'rejectedApplications', 'pendingApplications','studentName','course','incompleteProfile'));
}

    private function checkIncompleteProfile($student)
    {
        $requiredFields = ['studentName', 'registrationID', 'studentEmail', 'studentPhone', 'password', 'course', 'studyYear', 'currentGPA', 'introductionLetter', 'resultSlip', 'university'
];

        foreach ($requiredFields as $field) {
            if (empty($student->$field)) {
                return 'Please complete your profile information to apply for fieldworks.';
            }
        }

        return false; // Profile is complete
    }

    public function showLogBook(Request $request)
    {
        // Retrieve the student ID from the session
        $studentId = session('student_id');
    
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
    
        // Fetch all log book entries for the student
        $logBooks = LogBook::where('studentID', $studentId)
                            ->where('employerID', 1)
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

        // Retrieve the log book entry for the selected day
        $logBook = LogBook::where('studentID', 1)
                        ->where('employerID', 1)
                        ->first();

        // If there's no existing log book entry, create a new one
        if (!$logBook) {
            $logBook = new LogBook();
            $logBook->studentID = session('student_id');
            $logBook->employerID = 1;
            $logBook->save();
        }

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

       // Check if the student exists
       if (!$student) {
        return redirect('/student-login')->withErrors(['error' => 'Student not found.']);
       }

       return view('student.profile', compact('student','studentName','course','incompleteProfile'));
    }

    // Update Student Profile
    public function updateStudentProfile(Request $request)
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
        'studentName' => 'required|string|max:255',
        'registrationID' => 'required|string|max:255',
        'studentEmail' => 'required|email|max:255',
        'studentPhone' => 'required|string|max:255',
        'course' => 'required|string|max:255',
        'studyYear' => 'required|integer',
        'currentGPA' => 'required|numeric',
        'introductionLetter' => 'nullable|file|mimes:pdf,doc,docx',
        'resultSlip' => 'nullable|file|mimes:pdf,doc,docx',
    ]);

    //dd($request->all(), $student);

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

    

    $student->save();

    return redirect()->route('student-profile')->with('success', 'Profile updated successfully.')->with('message_type', 'success');
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
        
        // Find the fieldwork by its ID
        $application = Fieldwork::findOrFail($fieldworkId);
    
        // Check if the application is being confirmed or canceled
        if ($request->confirmed === 'yes') {
            // Update the confirmed field to 'yes'
            $application->confirmed = 'yes';
            $message = 'Application confirmed successfully.';
        } else {
            // Update the confirmed field to 'no'
            $application->confirmed = 'no';
            $message = 'Application canceled successfully.';
        }
    
        // Save the changes to the application
        $application->save();
    
        // Redirect back with a success message
        return redirect()->back()->with('success', $message);
    }
    

}
