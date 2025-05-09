<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GuruMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->level == 'GURU' && Auth::user()->si_masterdata == 1)
        {
            return $next($request);    
        }
        
        return abort(503, 'Anda tidak memiliki hak akses');
    }
}
