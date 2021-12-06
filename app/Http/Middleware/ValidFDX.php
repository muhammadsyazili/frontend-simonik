<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ValidFDX
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
        return $request->cookie('X-App') === 'fdx' ? $next($request) : redirect()->route('logout');
    }
}
