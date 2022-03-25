<?php

namespace App\Http\Controllers\Semongko\Extends\Target;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use App\Exports\TargetsExport;
use Maatwebsite\Excel\Facades\Excel;

class PaperWorkTargetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $response = null;
        if (!is_null($request->query('level')) && !is_null($request->query('unit')) && !is_null($request->query('tahun'))) {
            $response = SEMONGKO_services('/targets/paper-work/edit', 'get', [
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

        return view('components.semongko.target.paper-work.read-new', compact('response'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $targets = [];
        foreach ($request->post('targets') as $targetK => $targetV) {
            foreach ($targetV as $K => $V) {
                $targets[$targetK][$K] = (float) $V;
            }
        }

        $response = SEMONGKO_services('/targets/paper-work', 'put', [
            'level' => $request->post('level'),
            'unit' => $request->post('unit'),
            'tahun' => $request->post('tahun'),
            'targets' => $targets,
        ]);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('semongko.targets.paper-work.index', ['level' => $request->level, 'unit' => $request->unit, 'tahun' => $request->tahun]);
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

        $targets = [];
        for ($i = 1; $i < count($result[0]); $i++) {
            $targets[$result[0][$i][0]]['jan'] = $result[0][$i][3];
            $targets[$result[0][$i][0]]['feb'] = $result[0][$i][4];
            $targets[$result[0][$i][0]]['mar'] = $result[0][$i][5];
            $targets[$result[0][$i][0]]['apr'] = $result[0][$i][6];
            $targets[$result[0][$i][0]]['may'] = $result[0][$i][7];
            $targets[$result[0][$i][0]]['jun'] = $result[0][$i][8];
            $targets[$result[0][$i][0]]['jul'] = $result[0][$i][9];
            $targets[$result[0][$i][0]]['aug'] = $result[0][$i][10];
            $targets[$result[0][$i][0]]['sep'] = $result[0][$i][11];
            $targets[$result[0][$i][0]]['oct'] = $result[0][$i][12];
            $targets[$result[0][$i][0]]['nov'] = $result[0][$i][13];
            $targets[$result[0][$i][0]]['dec'] = $result[0][$i][14];
        }

        $response = SEMONGKO_services('/targets/paper-work/import', 'put', [
            'level' => $level,
            'unit' => $unit,
            'tahun' => $tahun,
            'targets' => $targets,
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
        return redirect()->route('semongko.targets.paper-work.index', ['level' => $level, 'unit' => $unit, 'tahun' => $tahun]);
    }

    public function export($level, $unit, $tahun)
    {
        $response = SEMONGKO_services('/targets/paper-work/export', 'get', [
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

        return Excel::download(new TargetsExport($level, $unit, $tahun, $response->object()->data->indicators), "Target@$level@$unit@$tahun.xlsx", \Maatwebsite\Excel\Excel::XLSX);
    }
}
