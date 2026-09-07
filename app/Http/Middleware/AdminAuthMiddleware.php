<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('admin.login')->with('error', 'Please log in to access the system administration.');
        }

        $user = Auth::user();
        if (!in_array($user->role, ['super_admin', 'admin', 'editor'])) {
            Auth::logout();
            return redirect()->route('admin.login')->with('error', 'Unauthorized access level.');
        }

        return $next($request);
    }
}
