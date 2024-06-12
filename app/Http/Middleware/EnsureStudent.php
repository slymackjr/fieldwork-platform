<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureStudent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
{
    if (Auth::guard('student')->check()) {
        // Retrieve the authenticated student
        $student = Auth::guard('student')->user();
        // Store the student ID and name in the session
        $request->session()->put('student_id', $student->studentID);
        $request->session()->put('student_name', $student->studentName);
        $request->session()->put('course', $student->course);
        // Proceed with the request
        return $next($request);
    }

    return redirect()->route('student-login')->with('error', 'Please log in as a student to access this section.');
}

}
