<?php

namespace App\Http\Middleware\FDX;

use Closure;
use Illuminate\Http\Request;

class Is__FDX
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
