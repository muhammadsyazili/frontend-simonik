<?php

namespace App\Http\Controllers\Simonik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        $response = null;
        if (!is_null($request->query('level')) && !is_null($request->query('unit')) && !is_null($request->query('tahun')) && !is_null($request->query('bulan'))) {
            $response = SIMONIK_sevices('/monitoring', 'get', [
                'level' => $request->query('level'),
                'unit' => $request->query('unit'),
                'tahun' => (int) $request->query('tahun'),
                'bulan' => $request->query('bulan'),
                'auth' => '0',
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

        return view('components.simonik.dashboard', compact('response'));
    }
}
