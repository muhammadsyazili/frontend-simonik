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
        if (!is_null($request->query('id_left')) && !is_null($request->query('level_left')) && !is_null($request->query('unit_left')) && !is_null($request->query('tahun_left')) && !is_null($request->query('bulan_left')) && !is_null($request->query('id_right')) && !is_null($request->query('level_right')) && !is_null($request->query('unit_right')) && !is_null($request->query('tahun_right')) && !is_null($request->query('bulan_right'))) {
            $response = SEMONGKO_services('/comparing', 'get', [
                'id_left' => $request->query('id_left'),
                'bulan_left' => $request->query('bulan_left'),

                'id_right' => $request->query('id_right'),
                'bulan_right' => $request->query('bulan_right'),
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
