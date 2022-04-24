<?php

namespace App\Http\Controllers\Semongko;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class ComparingController extends Controller
{
    public function comparing(Request $request)
    {
        $response = null;
        if (!is_null($request->query('id_kiri')) && !is_null($request->query('level_kiri')) && !is_null($request->query('unit_kiri')) && !is_null($request->query('tahun_kiri')) && !is_null($request->query('bulan_kiri')) && !is_null($request->query('id_kanan')) && !is_null($request->query('level_kanan')) && !is_null($request->query('unit_kanan')) && !is_null($request->query('tahun_kanan')) && !is_null($request->query('bulan_kanan'))) {
            $response = SEMONGKO_services('/comparing', 'get', [
                'id_kiri' => $request->query('id_kiri'),
                'bulan_kiri' => $request->query('bulan_kiri'),

                'id_kanan' => $request->query('id_kanan'),
                'bulan_kanan' => $request->query('bulan_kanan'),
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

        return view('components.semongko.comparing', compact('response'));
    }
}
