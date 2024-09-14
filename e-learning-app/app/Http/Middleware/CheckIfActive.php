<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIfActive
{
    public function handle($request, Closure $next)
            {
                $guard = session('auth.guard', 'web'); // Default to 'web' if not set
                $user = Auth::guard($guard)->user();
                if ($user && !$user->is_active) {
                    Auth::guard($guard)->logout();
                    return redirect()->route('login')->with('error', 'Your account is inactive.');
                }

                return $next($request);
            }
}
