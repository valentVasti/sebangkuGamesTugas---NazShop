<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthenticationAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Check if user is authenticated
        if (!auth()->check()) {
            // Redirect or return unauthorized response
            return redirect()->route('backend.login'); // Example: Redirect to login page
        }

        // User is authenticated, allow the request to proceed
        return $next($request);
    }
}
