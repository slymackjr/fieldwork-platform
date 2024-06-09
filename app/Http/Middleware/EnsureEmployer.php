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
            // Retrieve the employer ID from the session
            $request->session()->get('employer_id');

            // You can now use $employerId as needed in your middleware
            return $next($request);
        }

        return redirect('/login')->with('error', 'Please log in as an employer to access this section.');
    }
}
