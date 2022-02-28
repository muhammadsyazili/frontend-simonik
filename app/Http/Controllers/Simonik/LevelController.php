<?php

namespace App\Http\Controllers\Simonik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $response = SIMONIK_sevices('/levels', 'get');

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        $response = $response->object();

        return view('components.simonik.level.read', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = SIMONIK_sevices('/level/create', 'get');

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        $response = $response->object();

        return view('components.simonik.level.create', compact('response'));
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
            'name' => ['required', 'string', 'not_in:super-master,master,child,super-admin,admin,data-entry,employee'],
            'parent_level' => ['required', 'string'],
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'not_in' => ':attribute yang dipilih tidak sah.',
        ];

        $request->validate($attributes, $messages);

        $data = [
            'name' => $request->post('name'),
            'parent_level' => $request->post('parent_level'),
        ];

        $response = SIMONIK_sevices("/level", 'post', $data);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('simonik.level.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = SIMONIK_sevices("/level/$id/edit", 'get');

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        $response = $response->object();

        return view('components.simonik.level.edit', compact('response'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = [
            'name' => ['required', 'string', 'not_in:super-master,master,child,super-admin,admin,data-entry,employee'],
            'parent_level' => ['required', 'string'],
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'not_in' => ':attribute yang dipilih tidak sah.',
        ];

        $request->validate($attributes, $messages);

        $data = [
            'name' => $request->post('name'),
            'parent_level' => $request->post('parent_level'),
        ];

        $response = SIMONIK_sevices("/level/$id", 'put', $data);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('simonik.level.index');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, $name)
    {
        return view('components.simonik.level.delete', compact(['id', 'name']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = SIMONIK_sevices("/level/$id", 'delete', []);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('simonik.level.index');
    }
}
