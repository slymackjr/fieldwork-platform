<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureEmployer
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
        if (Auth::guard('employer')->check()) {
            // Retrieve the authenticated employer
            $employer = Auth::guard('employer')->user();
            // Store the employer ID and name in the session
            $request->session()->put('employer_id', $employer->employerID);
            $request->session()->put('employer_name', $employer->employerName);
            $request->session()->put('employer_company', $employer->companyName);

            // You can now use $employerId as needed in your middleware
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Please log in as an employer to access this section.');
    }
}
