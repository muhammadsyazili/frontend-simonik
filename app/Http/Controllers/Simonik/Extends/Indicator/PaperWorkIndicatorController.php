<?php

namespace App\Http\Controllers\Simonik\Extends\Indicator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class PaperWorkIndicatorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $response = null;
        if (is_null($request->query('level'))) {
            $response = callSIMONIK_Sevices(sprintf('/user/%s/levels', $request->cookie('X-User-Id')), 'get', ['with-super-master' => true]);

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
                'unit' => ['nullable', 'required_unless:level,super-master', 'string'],
                'tahun' => ['nullable', 'required_unless:level,super-master', 'string', 'date_format:Y'],
            ];

            $validated = $request->validate($attributes);

            $response = callSIMONIK_Sevices('/indicators/paper-work', 'get', $validated);

            if ($response->clientError()) {
                return redirect()->back()->withErrors($response->object()->errors);
            }

            if ($response->serverError()) {
                Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
                return redirect()->back();
            }
        }

        return view('components.simonik.indicator.paper-work.read', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = callSIMONIK_Sevices('/indicators/paper-work/create', 'get');

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        return view('components.simonik.indicator.paper-work.create', compact('response'));
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
            'indicators.*' => ['required', 'uuid'],
            'level' => ['required', 'string'],
            'year' => ['required', 'string', 'date_format:Y'],
        ];

        $validated = $request->validate($attributes);

        $response = callSIMONIK_Sevices('/indicators/paper-work', 'post', $validated);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('simonik.indicators.paper-work.index', defaultQueryParams());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $level
     * @param  string  $unit
     * @param  string  $tahun
     * @return \Illuminate\Http\Response
     */
    public function edit($level, $unit, $tahun)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $level
     * @param  string  $unit
     * @param  string  $tahun
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $level, $unit, $tahun)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $level
     * @param  string  $unit
     * @param  string  $tahun
     * @return \Illuminate\Http\Response
     */
    public function destroy($level, $unit, $tahun)
    {
        $response = callSIMONIK_Sevices("/indicators/paper-work/$level/$unit/$tahun", 'delete');

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('simonik.indicators.paper-work.index', defaultQueryParams());
    }
}
