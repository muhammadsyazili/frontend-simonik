<?php

namespace App\Http\Middleware\SIMONIK;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class IsActive
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
        $id = $request->cookie('X-User-Id');

        $response = SIMONIK_sevices("/user/$id/active/check", 'get', []);

        if ($response->clientError()) {
            return redirect()->route('logout')->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->route('logout');
        }

        return $response->object()->data->user->actived ? $next($request) : redirect()->route('simonik.user.password.change.form', ['id' => $request->cookie('X-User-Id')]);
    }
}
