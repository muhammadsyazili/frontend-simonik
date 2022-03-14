<?php

namespace App\Http\Controllers\Simonik\Extends\Realization;

use App\Exports\RealizationsExport;
use App\Http\Controllers\Controller;
use App\Imports\RealizationsImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

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

    public function import(Request $request, $level, $unit, $tahun)
    {
        $attributes = [
            'file' => ['required', 'mimes:xlsx', 'mimetypes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'],
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'mimes' => ':attribute harus :values.',
            'mimetypes' => ':attribute harus :values.',
        ];

        $request->validate($attributes, $messages);

        $file = $request->file('file');
        $fileName = rand() . $file->getClientOriginalName();
        $file->move('files', $fileName);

        $result = Excel::toArray([], public_path("/files/$fileName"));

        $realizations = [];
        for ($i = 1; $i < count($result[0]); $i++) {
            $realizations[$result[0][$i][0]]['jan'] = $result[0][$i][3];
            $realizations[$result[0][$i][0]]['feb'] = $result[0][$i][4];
            $realizations[$result[0][$i][0]]['mar'] = $result[0][$i][5];
            $realizations[$result[0][$i][0]]['apr'] = $result[0][$i][6];
            $realizations[$result[0][$i][0]]['may'] = $result[0][$i][7];
            $realizations[$result[0][$i][0]]['jun'] = $result[0][$i][8];
            $realizations[$result[0][$i][0]]['jul'] = $result[0][$i][9];
            $realizations[$result[0][$i][0]]['aug'] = $result[0][$i][10];
            $realizations[$result[0][$i][0]]['sep'] = $result[0][$i][11];
            $realizations[$result[0][$i][0]]['oct'] = $result[0][$i][12];
            $realizations[$result[0][$i][0]]['nov'] = $result[0][$i][13];
            $realizations[$result[0][$i][0]]['dec'] = $result[0][$i][14];
        }

        $response = SIMONIK_sevices('/realizations/paper-work/import', 'put', [
            'level' => $level,
            'unit' => $unit,
            'tahun' => $tahun,
            'realizations' => $realizations,
        ]);

        if ($response->clientError()) {
            unlink(public_path("/files/$fileName"));
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            unlink(public_path("/files/$fileName"));
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        unlink(public_path("/files/$fileName"));
        return redirect()->route('simonik.realizations.paper-work.index', ['level' => $level, 'unit' => $unit, 'tahun' => $tahun]);
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

        return Excel::download(new RealizationsExport($level, $unit, $tahun, $response->object()->data->indicators), "Realisasi@$level@$unit@$tahun.xlsx", \Maatwebsite\Excel\Excel::XLSX);
    }
}
