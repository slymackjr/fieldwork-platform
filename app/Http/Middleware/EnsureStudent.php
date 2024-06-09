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
        // Retrieve the student ID from the authenticated student
        $studentId = Auth::guard('student')->id();
        // Store the student ID in the session
        $request->session()->put('student_id', $studentId);
        // Proceed with the request
        return $next($request);
    }

    return redirect('/student-login')->with('error', 'Please log in as a student to access this section.');
}

}
