<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\Fieldwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $employers = Employer::select('employerID','companyName', 'location', 'fieldworkTitle', 'applicationDeadline', 'companyLogo')
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
    }
}
