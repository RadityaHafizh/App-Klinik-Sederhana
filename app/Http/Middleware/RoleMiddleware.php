<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next, $role)
    {
        logger(strtolower(Auth::user()->role) !== strtolower($role));

        if (!Auth::check()) {
            return redirect('/login');
        }

        if (strtolower(Auth::user()->role) !== strtolower($role)) {
            abort(403, 'Unauthorized. Your role: ' . Auth::user()->role);
        }

        return $next($request);
    }


}
