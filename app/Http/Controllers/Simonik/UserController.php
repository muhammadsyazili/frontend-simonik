<?php

namespace App\Http\Controllers\Simonik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = SIMONIK_sevices('/users', 'get');

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        $response = $response->object();

        return view('components.simonik.user.read', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = SIMONIK_sevices('/user/create', 'get');

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        $response = $response->object();

        return view('components.simonik.user.create', compact('response'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = [
            'name' => ['required', 'string'],
            'nip' => ['required', 'string'],
            'username' => ['required', 'string', 'alpha_dash'],
            'email' => ['required', 'string'],
            'unit' => ['required', 'string'],
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'alpha_dash' => ':attribute hanya boleh mengandung huruf, angka, dashes (-) and underscores (_).',
        ];

        $request->validate($attributes, $messages);

        $data = [
            'name' => $request->post('name'),
            'nip' => $request->post('nip'),
            'username' => $request->post('username'),
            'email' => $request->post('email'),
            'unit' => $request->post('unit'),
        ];

        $response = SIMONIK_sevices("/user", 'post', $data);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('simonik.user.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string|int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = SIMONIK_sevices("/user/$id/edit", 'get');

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        $response = $response->object();

        return view('components.simonik.user.edit', compact('response'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = [
            'name' => ['required', 'string'],
            'nip' => ['required', 'string'],
            'username' => ['required', 'string', 'alpha_dash'],
            'email' => ['required', 'string'],
            'unit' => ['required', 'string'],
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'alpha_dash' => ':attribute hanya boleh mengandung huruf, angka, dashes (-) and underscores (_).',
        ];

        $request->validate($attributes, $messages);

        $data = [
            'name' => $request->post('name'),
            'nip' => $request->post('nip'),
            'username' => $request->post('username'),
            'email' => $request->post('email'),
            'unit' => $request->post('unit'),
        ];

        $response = SIMONIK_sevices("/user/$id", 'put', $data);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('simonik.user.index');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  string|int  $id
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function delete($id, $username)
    {
        return view('components.simonik.user.delete', compact(['id', 'username']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string|int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = SIMONIK_sevices("/user/$id", 'delete', []);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('simonik.user.index');
    }

    /**
     * Show the form for password reset.
     *
     * @param  string|int  $id
     * @param  string  $username
     * @return \Illuminate\Http\Response
     */
    public function password_reset_form($id, $username)
    {
        return view('components.simonik.user.password-reset', compact(['id', 'username']));
    }

    /**
     * Password reset.
     *
     * @param  string|int  $id
     * @return \Illuminate\Http\Response
     */
    public function password_reset($id)
    {
        $response = SIMONIK_sevices("/user/$id/password/reset", 'get', []);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('simonik.user.index');
    }

    /**
     * Show the form for password change.
     *
     * @param  string|int  $id
     * @return \Illuminate\Http\Response
     */
    public function password_change_form($id)
    {
        return view('components.simonik.user.password-change', compact(['id']));
    }

    /**
     * Password reset.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|int  $id
     * @return \Illuminate\Http\Response
     */
    public function password_change(Request $request, $id)
    {
        $attributes = [
            'password' => ['required', 'string', 'confirmed'],
            'password_confirmation' => ['required', 'string'],
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'confirmed' => ':attribute tidak sama.',
        ];

        $request->validate($attributes, $messages);

        $data = [
            'password' => $request->post('password'),
        ];

        $response = SIMONIK_sevices("/user/$id/password/change", 'put', $data);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('home');
    }
}
