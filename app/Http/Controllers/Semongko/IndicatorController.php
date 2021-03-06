<?php

namespace App\Http\Controllers\Semongko;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class IndicatorController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.semongko.indicator.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = [
            'indicator' => ['required', 'string', 'max:100'],
            'type' => ['required'],
            'dummy' => ['required', 'boolean'],
            'reducing_factor' => ['required_if:dummy,0', 'boolean'],
            'polarity' => ['required_if:reducing_factor,0', 'in:aman,1,-1'],
            'formula' => ['nullable', 'string'],
            'measure' => ['nullable', 'string'],
            'validity' => ['nullable'],
            'weight' => ['nullable'],
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'max' => [
                'numeric' => ':attribute tidak boleh lebih besar dari :max.',
                'file'    => ':attribute tidak boleh lebih besar dari :max kilobytes.',
                'string'  => ':attribute tidak boleh lebih besar dari :max characters.',
                'array'   => ':attribute tidak boleh lebih dari :max items.',
            ],
            'boolean' => ':attribute harus true atau false.',
            'required_if' => ':attribute tidak boleh kosong.',
            'in' => ':attribute yang dipilih tidak sah.',
            'numeric' => ':attribute harus numerik.',
            'gte' => [
                'numeric' => ':attribute harus lebih besar dari atau sama dengan :value.',
                'file'    => ':attribute harus lebih besar dari atau sama dengan :value kilobytes.',
                'string'  => ':attribute harus lebih besar dari atau sama dengan :value characters.',
                'array'   => ':attribute harus memiliki :value item atau lebih.',
            ],
        ];

        if (!is_null($request->post('validity'))) {
            foreach ($request->post('validity') as $key => $value) {
                $attributes["validity.$key"] = ['in:aman,1'];
            }
        }

        if (!is_null($request->post('weight'))) {
            foreach ($request->post('weight') as $key => $value) {
                $attributes["weight.$key"] = ['numeric', 'gte:0'];
            }
        }

        $request->validate($attributes, $messages);

        $data = [
            'indicator' => $request->post('indicator'),
            'type' => $request->post('type'),
            'dummy' => $request->post('dummy'),
            'reducing_factor' => $request->post('reducing_factor'),
            'polarity' => $request->post('polarity'),
            'formula' => $request->post('formula'),
            'measure' => $request->post('measure'),
            'validity' => $request->post('validity'),
            'weight' => $request->post('weight'),
        ];

        $response = SEMONGKO_services('/indicator', 'post', $data);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', sprintf("%s, Silakan lanjut ke menu <a class=\"text-warning font-weight-bold\" href=\"%s\">Referensi - Indikator: Create</a>", $response->object()->message, route('semongko.indicators.paper-work.reference.create')));
        return redirect()->route('semongko.indicators.create');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $response = SEMONGKO_services("/indicator/$id/edit", 'get');

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        $response = $response->object();

        return view('components.semongko.indicator.edit', compact('response'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = [
            'indicator' => ['required', 'string', 'max:100'],
            'type' => ['required'],
            'dummy' => ['required', 'boolean'],
            'reducing_factor' => ['required_if:dummy,0', 'boolean'],
            'polarity' => ['required_if:reducing_factor,0', 'in:aman,1,-1'],
            'formula' => ['nullable', 'string'],
            'measure' => ['nullable', 'string'],
            'validity' => ['nullable'],
            'weight' => ['nullable'],
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong.',
            'max' => [
                'numeric' => ':attribute tidak boleh lebih besar dari :max.',
                'file'    => ':attribute tidak boleh lebih besar dari :max kilobytes.',
                'string'  => ':attribute tidak boleh lebih besar dari :max characters.',
                'array'   => ':attribute tidak boleh lebih dari :max items.',
            ],
            'boolean' => ':attribute harus true atau false.',
            'required_if' => ':attribute tidak boleh kosong.',
            'in' => ':attribute yang dipilih tidak sah.',
            'numeric' => ':attribute harus numerik.',
            'gte' => [
                'numeric' => ':attribute harus lebih besar dari atau sama dengan :value.',
                'file'    => ':attribute harus lebih besar dari atau sama dengan :value kilobytes.',
                'string'  => ':attribute harus lebih besar dari atau sama dengan :value characters.',
                'array'   => ':attribute harus memiliki :value item atau lebih.',
            ],
        ];

        if (!is_null($request->post('validity'))) {
            foreach ($request->post('validity') as $key => $value) {
                $attributes["validity.$key"] = ['in:aman,1'];
            }
        }

        if (!is_null($request->post('weight'))) {
            foreach ($request->post('weight') as $key => $value) {
                $attributes["weight.$key"] = ['numeric', 'gte:0'];
            }
        }

        $request->validate($attributes, $messages);

        $data = [
            'indicator' => $request->post('indicator'),
            'type' => $request->post('type'),
            'dummy' => $request->post('dummy'),
            'reducing_factor' => $request->post('reducing_factor'),
            'polarity' => $request->post('polarity'),
            'formula' => $request->post('formula'),
            'measure' => $request->post('measure'),
            'validity' => $request->post('validity'),
            'weight' => $request->post('weight'),
        ];

        $response = SEMONGKO_services("/indicator/$id", 'put', $data);

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);

        return $response->object()->data->referenced ? redirect()->route('semongko.indicators.paper-work.index', ['level' => $request->level, 'unit' => $request->unit, 'tahun' => $request->tahun]) : redirect()->route('semongko.indicators.paper-work.reference.create');
    }

    /**
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id, $name)
    {
        return view('components.semongko.indicator.delete', compact(['id', 'name']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $response = SEMONGKO_services("/indicator/$id", 'delete');

        if ($response->clientError()) {
            return redirect()->back()->withErrors($response->object()->errors);
        }

        if ($response->serverError()) {
            Session::flash('danger_message', Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR]);
            return redirect()->back();
        }

        Session::flash('info_message', $response->object()->message);
        return redirect()->route('semongko.indicators.paper-work.index', ['level' => $request->level, 'unit' => $request->unit, 'tahun' => $request->tahun]);
    }
}
