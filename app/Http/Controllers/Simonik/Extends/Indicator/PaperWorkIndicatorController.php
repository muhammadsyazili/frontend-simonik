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
        if (!is_null($request->query('level'))) {
            $attributes = [
                'level' => ['required', 'string'],
                'unit' => ['nullable', 'required_unless:level,super-master', 'string'],
                'tahun' => ['nullable', 'required_unless:level,super-master', 'string', 'date_format:Y'],
            ];

            $messages = [
                'required' => ':attribute tidak boleh kosong.',
                'required_unless' => ':attribute tidak boleh kosong.',
                'date_format' => ':attribute harus berformat yyyy.',
            ];

            $validated = $request->validate($attributes, $messages);

            $response = SIMONIK_sevices('/indicators/paper-work', 'get', $validated);

            if ($response->clientError()) {
                return redirect()->back()->withErrors($response->object()->errors);
            }

            if ($response->serverError()) {
                Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
                return redirect()->back();
            }

            $response = $response->object();
        }

        return view('components.simonik.indicator.paper-work.read-new', compact('response'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = SIMONIK_sevices('/indicators/paper-work/create', 'get');

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        $response = $response->object();

        return view('components.simonik.indicator.paper-work.create-new', compact('response'));
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

        $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'uuid' => ':attribute harus UUID format.',
            'date_format' => ':attribute harus berformat yyyy.',
        ];

        $validated = $request->validate($attributes, $messages);

        $response = SIMONIK_sevices('/indicators/paper-work', 'post', $validated);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('simonik.indicators.paper-work.index', ['level' => $request->level, 'unit' => 'master', 'tahun' => $request->year]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $level
     * @param  string  $unit
     * @param  string  $tahun
     * @return \Illuminate\Http\Response
     */
    public function edit($level, string $unit, string $tahun)
    {
        $response = SIMONIK_sevices("/indicators/paper-work/$level/$unit/$tahun/edit", 'get');

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        //dd($response->object()->data);

        return view('components.simonik.indicator.paper-work.edit', compact(['response', 'level', 'unit', 'tahun']));
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
    public function update(Request $request, string $level, string $unit, string $tahun)
    {
        $attributes = [
            'indicators.*' => ['required', 'uuid'],
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'uuid' => ':attribute harus UUID format.',
        ];

        $validated = $request->validate($attributes, $messages);

        $response = SIMONIK_sevices("/indicators/paper-work/$level/$unit/$tahun", 'put', $validated);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('simonik.indicators.paper-work.index', ['level' => $level, 'unit' => $unit, 'tahun' => $tahun]);
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  string  $level
     * @param  string  $unit
     * @param  string  $tahun
     * @return \Illuminate\Http\Response
     */
    public function delete($level, $unit, $tahun)
    {
        return view('components.simonik.indicator.paper-work.delete', compact(['level', 'unit', 'tahun']));
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
        $response = SIMONIK_sevices("/indicators/paper-work/$level/$unit/$tahun", 'delete');

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('simonik.indicators.paper-work.index', ['level' => $level, 'unit' => $unit, 'tahun' => $tahun]);
    }

    /**
     * Reorder the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function reorder(Request $request)
    {
        $response = $request->query('level') === 'super-master' ? SIMONIK_sevices("/indicators/paper-work/reorder", 'put', ['indicators' => $request->post('indicators'), 'level' => $request->query('level')]) : SIMONIK_sevices("/indicators/paper-work/reorder", 'put', ['indicators' => $request->post('indicators'), 'level' => $request->query('level'), 'unit' => $request->query('unit'), 'year' => $request->query('tahun')]);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('simonik.indicators.paper-work.index', $request->level === 'super-master' ? ['level' => $request->level] : ['level' => $request->level, 'unit' => $request->unit, 'tahun' => $request->tahun]);
    }
}
