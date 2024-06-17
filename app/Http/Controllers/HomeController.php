<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Fieldwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\Debugbar\Facades\Debugbar;

class HomeController extends Controller
{
    public function index(Request $request)
{
    $keyword = $request->input('keyword');
    $location = $request->input('location');
    // Add a custom message to the Debugbar
    //Debugbar::info('Hello from Debugbar!');
     // Add data to the Debugbar
     //$data = ['foo' => 'bar'];
     //Debugbar::addMessage($data, 'Data');
    // Perform search query based on $keyword and $location
    $query = Employer::query();

    if (!empty($keyword)) {
        $query->whereRaw('LOWER(fieldworkTitle) LIKE ?', ['%' . strtolower($keyword) . '%']);
    }

    if (!empty($location)) {
        $query->whereRaw('LOWER(location) LIKE ?', ['%' . strtolower($location) . '%']);
    }

    $employers = $query->select('employerID', 'companyName', 'location', 'fieldworkTitle', 'applicationDeadline', 'companyLogo')
        ->get();

    return view('home', compact('employers'));
}


    public function contact()
    {
        return view('contact');
    }

    public function fieldworkDetails($employerID)
    {
        $employer = Employer::findOrFail($employerID);
        return view('fieldwork_details', compact('employer'));
    }

    public function applyField(Request $request)
    {
        $employerID = $request->input('employerID');
        $studentID = $request->input('studentID'); 
        // Dump the inputs for debugging purposes
         //dd($employerID, $studentID);
        if (Auth::guard('student')->check())
        {
            
            // Check if the student has already applied
            if (Fieldwork::hasApplied($employerID, $studentID)) {
                // Handle the case where the student has already applied
                return redirect()->back()->with('error', 'You have already applied for this fieldwork.');
            }
        
            // Create a new Fieldwork entry
            Fieldwork::create([
                'employerID' => $employerID,
                'studentID' => $studentID,
                'status' => 'pending', // Set initial status as pending
                'confirmed' => 'no' // Set confirmed status as no initially
            ]);

        
            // Redirect or return a response after successful application
            return redirect()->back()->with('success', 'Application submitted successfully!');   
        }
        // Redirect to login if student is not authenticated
        return redirect()->route('student-login')->with('error', 'Please log in to apply for fieldwork.');
    }

}
