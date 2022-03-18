<?php

namespace App\Http\Controllers\Simonik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RangkingController extends Controller
{
    public function rangking(Request $request)
    {
        $response = null;
        if (!is_null($request->query('kategori_level')) && !is_null($request->query('tahun')) && !is_null($request->query('bulan'))) {
            $response = SIMONIK_sevices('/rangking', 'get', [
                'kategori_level' => $request->query('kategori_level'),
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

        return view('components.simonik.rangking', compact('response'));
    }
}
