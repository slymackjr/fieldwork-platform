<?php

namespace App\Http\Controllers;

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

        return redirect()->route('home')->with('success', 'Registration successful.');
    }

    public function showHome()
{
    // Fetch the authenticated student's ID from the session
    $studentId = session('student_id');

    // Fetch and count the different statuses for the authenticated student
    $totalApplications = Fieldwork::where('studentID', $studentId)->count();
    $acceptedApplications = Fieldwork::where('studentID', $studentId)->where('status', 'accepted')->count();
    $rejectedApplications = Fieldwork::where('studentID', $studentId)->where('status', 'rejected')->count();
    $pendingApplications = Fieldwork::where('studentID', $studentId)->where('status', 'pending')->count();

    // Fetch fieldwork data for the authenticated student and join with employers
    $fieldworks = Fieldwork::where('studentID', $studentId)
        ->join('employers', 'fieldworks.employerID', '=', 'employers.employerID')
        ->select('fieldworks.*', 'employers.companyName', 'employers.fieldworkTitle')
        ->get();

    return view('student.index', compact('fieldworks', 'totalApplications', 'acceptedApplications', 'rejectedApplications', 'pendingApplications'));
}


    public function showLogBook()
    {
        return view('student.log-book');
    }

    public function showStudentProfile()
    {
       // Retrieve the student ID from the session
       $studentId = session('student_id');

       // Retrieve the student's data using the student ID
       $student = Student::find($studentId);

       // Check if the student exists
       if (!$student) {
        return redirect('/student-login')->withErrors(['error' => 'Student not found.']);
       }

       return view('student.profile', compact('student'));
    }

     // Update Student Profile
     public function updateStudentProfile(Request $request)
     {
         // Retrieve the student ID from the session
         $studentId = $request->session()->get('student_id');
 
         // Retrieve the student's data using the student ID
         $student = Student::find($studentId);
 
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
             'attachmentStartDate' => 'required|date',
             'attachmentEndDate' => 'required|date'
         ]);
 
         // Update the student's data
         $student->studentName = $validated['studentName'];
         $student->registrationID = $validated['registrationID'];
         $student->studentEmail = $validated['studentEmail'];
         $student->studentPhone = $validated['studentPhone'];
         $student->course = $validated['course'];
         $student->studyYear = $validated['studyYear'];
         $student->currentGPA = $validated['currentGPA'];
         $student->attachmentStartDate = $validated['attachmentStartDate'];
         $student->attachmentEndDate = $validated['attachmentEndDate'];
 
         // Handle file uploads
         if ($request->hasFile('introductionLetter')) {
             if ($student->introductionLetter) {
                 Storage::delete($student->introductionLetter);
             }
             $student->introductionLetter = $request->file('introductionLetter')->store('introductionLetters');
         }
 
         if ($request->hasFile('resultSlip')) {
             if ($student->resultSlip) {
                 Storage::delete($student->resultSlip);
             }
             $student->resultSlip = $request->file('resultSlip')->store('resultSlips');
         }
 
         $student->save();
 
         return redirect()->route('student-profile')->with('success', 'Profile updated successfully.')->with('message_type', 'success');
     }

     // Change Student Password
    public function changePassword(Request $request)
    {
        // Retrieve the student ID from the session
        $studentId = $request->session()->get('student_id');

        // Retrieve the student's data using the student ID
        $student = Student::find($studentId);

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
    $fieldworkId = $request->input('fieldwork_id');
    
    // Find all accepted applications for the current student
    $acceptedApplications = Fieldwork::where('studentID', session('student_id'))
                                      ->where('status', 'accepted')
                                      ->get();
    
    // Retain the selected application and delete all other accepted applications for the student
    foreach ($acceptedApplications as $application) {
        if ($application->fieldworkID != $fieldworkId) {
            $application->delete();
        }
    }

    return redirect()->back()->with('success', 'Application confirmed successfully.');
}


}
