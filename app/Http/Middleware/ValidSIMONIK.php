<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidSIMONIK
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
        return session('app') == 'simonik' ? $next($request) : redirect()->route('logout');
    }
}
