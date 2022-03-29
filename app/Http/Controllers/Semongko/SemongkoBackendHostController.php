<?php

namespace App\Http\Controllers\Semongko;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SemongkoBackendHostController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $host = SEMONGKO_backend_host();
        return view('components.semongko.settings.backend-host.edit', compact('host'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $attributes = [
            'host' => ['required', 'string'],
        ];

        $messages = [
            'required' => ':attribute tidak boleh kosong.',
        ];

        $request->validate($attributes, $messages);

        // Update Key
        $data['host'] = $request->post('host');

        // Write File
        $jsonString = json_encode($data, JSON_PRETTY_PRINT);

        file_put_contents(storage_path("host/semongko_backend.json"), stripslashes($jsonString));

        Session::flash('info_message', 'Backend Host Updated!');
        return redirect()->route('semongko.host.edit');
    }
}
