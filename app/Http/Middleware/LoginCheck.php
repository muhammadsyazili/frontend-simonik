<?php

namespace App\Http\Middleware;

use CustomAuth;
use Closure;
use Illuminate\Http\Request;

class LoginCheck
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
        return CustomAuth::check() ? $next($request) : redirect()->route('login');
    }
}
