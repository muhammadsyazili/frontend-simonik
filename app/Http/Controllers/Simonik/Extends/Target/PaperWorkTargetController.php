<?php

namespace App\Http\Controllers\Simonik\Extends\Target;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class PaperWorkTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $response = null;
        if (is_null($request->query('level')) || is_null($request->query('unit')) || is_null($request->query('tahun'))) {
            $response = callSIMONIK_Sevices(sprintf('/user/%s/levels', $request->cookie('X-User-Id')), 'get');

            if ($response->clientError()) {
                return redirect()->back()->withErrors($response->object()->errors);
            }

            if ($response->serverError()) {
                Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
                return redirect()->back();
            }
        } else {
            $attributes = [
                'level' => ['required', 'string'],
                'unit' => ['required', 'string'],
                'tahun' => ['required', 'string', 'date_format:Y'],
            ];

            $validated = $request->validate($attributes);

            $response = callSIMONIK_Sevices('/targets/paper-work/edit', 'get', $validated);

            if ($response->clientError()) {
                return redirect()->back()->withErrors($response->object()->errors);
            }

            if ($response->serverError()) {
                Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
                return redirect()->back();
            }
        }

        return view('components.simonik.target.paper-work.read', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
