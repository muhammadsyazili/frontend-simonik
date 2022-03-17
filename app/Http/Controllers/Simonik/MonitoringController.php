<?php

namespace App\Http\Controllers\Simonik;

use App\Exports\MonitoringExport;
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
        if (!is_null($request->query('level')) && !is_null($request->query('tahun')) && !is_null($request->query('bulan'))) {
            $response = SIMONIK_sevices('/monitoring', 'get', [
                'level' => $request->query('level'),
                'unit' => $request->query('unit'),
                'tahun' => (int) $request->query('tahun'),
                'bulan' => $request->query('bulan'),
                'auth' => '1',
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

        return view('components.simonik.monitoring', compact('response'));
    }

    public function export($level, $unit, $tahun, $bulan)
    {
        $response = SIMONIK_sevices('/monitoring/export', 'get', [
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

        return Excel::download(new MonitoringExport($response->object()->data->indicators, $bulan), "Kertas Kerja@$level@$unit@$tahun@s.d.$bulan.xlsx", \Maatwebsite\Excel\Excel::XLSX);
    }
}
