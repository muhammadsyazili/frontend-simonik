<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminRoleCheck
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
        return $request->cookie('X-Role') === 'super-admin' || $request->cookie('X-Role') === 'admin' ? $next($request) : redirect()->route('simonik.dashboard');
    }
}
