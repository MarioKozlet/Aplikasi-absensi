<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!Auth::check()) return redirect('/login');

        $userRole = Auth::user()->level;

        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Akses ditolak.');
    }
}
