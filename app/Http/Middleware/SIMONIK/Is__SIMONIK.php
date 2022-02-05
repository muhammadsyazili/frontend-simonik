<?php

namespace App\Http\Middleware\SIMONIK;

use Closure;
use Illuminate\Http\Request;

class Is__SIMONIK
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
        return $request->cookie('X-App') === 'simonik' ? $next($request) : redirect()->route('logout');
    }
}
