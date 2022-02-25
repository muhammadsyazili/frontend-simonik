<?php

namespace App\Http\Controllers\Simonik\Extends\Target;

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
        if (is_null($request->query('level')) && is_null($request->query('unit')) && is_null($request->query('tahun'))) {
            $response = SIMONIK_sevices(sprintf('/user/%s/levels', $request->cookie('X-User-Id')), 'get', ['with-super-master' => 'false']);

            if ($response->clientError()) {
                return redirect()->back()->withErrors($response->object()->errors);
            }

            if ($response->serverError()) {
                Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
                return redirect()->back();
            }
        } else {
            $response = SIMONIK_sevices('/targets/paper-work/edit', 'get', [
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
        }

        return view('components.simonik.target.paper-work.read', compact('response'));
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

        $response = SIMONIK_sevices('/targets/paper-work', 'put', [
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
        return redirect()->route('simonik.targets.paper-work.index', ['level' => $request->level, 'unit' => $request->unit, 'tahun' => $request->tahun]);
    }

    public function export($level, $unit, $tahun)
    {
        return Excel::download(new TargetsExport($level, $unit, $tahun), "$level-$unit-$tahun.xlsx", \Maatwebsite\Excel\Excel::XLSX, [
            'Content-Type' => 'text/csv',
      ]);
    }
}
