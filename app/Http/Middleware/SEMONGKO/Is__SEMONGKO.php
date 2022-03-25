<?php

namespace App\Http\Middleware\SEMONGKO;

use Closure;
use Illuminate\Http\Request;

class Is__SEMONGKO
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
        return $request->cookie('X-App') === 'semongko' ? $next($request) : redirect()->route('logout');
    }
}
