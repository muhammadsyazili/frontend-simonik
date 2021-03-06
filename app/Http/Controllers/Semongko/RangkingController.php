<?php

namespace App\Http\Controllers\Semongko;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class RangkingController extends Controller
{
    public function rangking(Request $request)
    {
        $response = null;
        if (!is_null($request->query('kategori')) && !is_null($request->query('tahun')) && !is_null($request->query('bulan'))) {
            $response = SEMONGKO_services('/rangking', 'get', [
                'kategori' => $request->query('kategori'),
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

        return view('components.semongko.rangking', compact('response'));
    }
}
