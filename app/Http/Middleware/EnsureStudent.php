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
        // Proceed with the request
        return $next($request);
    }

    return redirect()->route('student-login')->with('error', 'Please log in as a student to access this section.');
}

}
