<?php

namespace App\Http\Controllers;

use CustomAuth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginForm()
    {
        if (CustomAuth::check()) {
            return redirect()->route('home');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $attributes = [
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
            'app' => ['required', 'in:simonik,fdx'],
        ];

        $validated = $request->validate($attributes);

        $attempt = CustomAuth::attempt($validated['username'], $validated['password'], $validated['app']);

        if ($attempt) {
            return redirect()->route('home');
        } else {
            Session::flash('danger_message', CustomAuth::getErrorMessage());
            return redirect()->route('login.form')->withErrors(CustomAuth::getErrors());
        }
    }

    public function logout()
    {
        CustomAuth::destroy();
        return redirect()->route('login');
    }
}
