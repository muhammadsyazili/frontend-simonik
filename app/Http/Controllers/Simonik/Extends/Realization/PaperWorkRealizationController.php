<?php

namespace App\Http\Controllers\Simonik\Extends\Realization;

use App\Exports\RealizationsExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Maatwebsite\Excel\Facades\Excel;

class PaperWorkRealizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $response = null;
        if (!is_null($request->query('level')) && !is_null($request->query('unit')) && !is_null($request->query('tahun'))) {
            $response = SIMONIK_sevices('/realizations/paper-work/edit', 'get', [
                'level' => $request->query('level'),
                'unit' => $request->query('unit'),
                'tahun' => $request->query('tahun'),
            ]);

            if ($response->clientError()) {
                return redirect()->back()->withErrors($response->object()->errors);
            }

            if ($response->serverError()) {
                Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
                return redirect()->back();
            }

            $response = $response->object();
        }

        return view('components.simonik.realization.paper-work.read-new', compact('response'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $realizations = [];
        foreach ($request->post('realizations') as $realizationK => $realizationV) {
            foreach ($realizationV as $K => $V) {
                $realizations[$realizationK][$K] = (float) $V;
            }
        }

        $response = SIMONIK_sevices('/realizations/paper-work', 'put', [
            'level' => $request->post('level'),
            'unit' => $request->post('unit'),
            'tahun' => $request->post('tahun'),
            'realizations' => $realizations,
        ]);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('simonik.realizations.paper-work.index', ['level' => $request->level, 'unit' => $request->unit, 'tahun' => $request->tahun]);
    }

    public function import()
    {
        
    }

    public function export($level, $unit, $tahun)
    {
        $response = SIMONIK_sevices('/realizations/paper-work/export', 'get', [
            'level' => $level,
            'unit' => $unit,
            'tahun' => $tahun,
        ]);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        return Excel::download(new RealizationsExport($response->object()->data->indicators), "Realisasi@$level@$unit@$tahun.xlsx", \Maatwebsite\Excel\Excel::XLSX);
    }
}
