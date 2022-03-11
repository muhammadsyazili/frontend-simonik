<?php

namespace App\Http\Controllers\Simonik;

use App\Exports\ExportExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Maatwebsite\Excel\Facades\Excel;

class ExportController extends Controller
{
    public function index(Request $request)
    {
        $response = null;
        if (!is_null($request->query('level')) && !is_null($request->query('unit')) && !is_null($request->query('tahun'))) {
            $response = SIMONIK_sevices('/export', 'get', [
                'level' => $request->query('level'),
                'unit' => $request->query('unit'),
                'tahun' => (int) $request->query('tahun'),
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

        return view('components.simonik.export', compact('response'));
    }

    public function export($level, $unit, $tahun)
    {
        $response = SIMONIK_sevices('/export', 'get', [
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

        return Excel::download(new ExportExport($response->object()->data->indicators), "Kertas Kerja@$level@$unit@$tahun.xlsx", \Maatwebsite\Excel\Excel::XLSX);
    }
}
