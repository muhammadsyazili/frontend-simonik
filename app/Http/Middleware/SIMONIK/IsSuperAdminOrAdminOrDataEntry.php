<?php

namespace App\Http\Middleware\SIMONIK;

use Closure;
use Illuminate\Http\Request;

class IsSuperAdminOrAdminOrDataEntry
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
        return $request->cookie('X-Role') === 'super-admin' || $request->cookie('X-Role') === 'admin' || $request->cookie('X-Role') === 'data-entry' ? $next($request) : redirect()->back();
    }
}
