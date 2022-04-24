<?php

namespace App\Http\Controllers\Semongko;

use App\Exports\Exporting;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Maatwebsite\Excel\Facades\Excel;

class MonitoringController extends Controller
{
    public function monitoring(Request $request)
    {
        $response = null;
        if (!is_null($request->query('level')) && !is_null($request->query('unit')) && !is_null($request->query('tahun')) && !is_null($request->query('bulan'))) {
            $response = SEMONGKO_services('/monitoring', 'get', [
                'level' => $request->query('level'),
                'unit' => $request->query('unit'),
                'tahun' => (int) $request->query('tahun'),
                'bulan' => $request->query('bulan'),
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

        return view('components.semongko.monitoring', compact('response'));
    }

    public function exporting($level, $unit, $tahun, $bulan)
    {
        $response = SEMONGKO_services('/exporting', 'get', [
            'level' => $level,
            'unit' => $unit,
            'tahun' => $tahun,
            'bulan' => $bulan,
        ]);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        return Excel::download(new Exporting($response->object()->data->indicators, $bulan), "kertas-kerja@$level@$unit@$tahun@s.d.$bulan.xlsx", \Maatwebsite\Excel\Excel::XLSX);
    }
}
