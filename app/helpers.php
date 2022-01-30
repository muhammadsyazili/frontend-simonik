<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

function params()
{
    $query = null;
    if (is_null(request()->query('level'))) {
        if (Cookie::get('X-Role') === 'super-admin') {
            $query['level'] = 'super-master';
        } else if (Cookie::get('X-Role') === 'admin') {
            $query['level'] = Cookie::get('X-Level');
            $query['unit'] = 'master';
            $query['tahun'] = now()->year;
        } else {
            $query['level'] = Cookie::get('X-Level');
            $query['unit'] = Cookie::get('X-Unit');
            $query['tahun'] = now()->year;
        }
    } else {
        $query['level'] = request()->query('level');
        $query['unit'] = request()->query('unit');
        $query['tahun'] = request()->query('tahun');
    }

    return $query;
}

function SIMONIK_sevices($endpoint, $method, $data = [], $withToken = true)
{
    $host = env('HOST_SIMONIK');
    $token = Cookie::get('X-Token') ?? null;

    return $withToken === false ? Http::$method("$host$endpoint", $data) : Http::withToken($token)->withHeaders(['X-User-Id' => Cookie::get('X-User-Id') ?? null])->$method("$host$endpoint", $data);
}

function FDX_sevices($endpoint, $method, $data = [], $withToken = true)
{
    $host = env('HOST_FDX');
    $token = Cookie::get('X-Token') ?? null;

    return $withToken === false ? Http::$method("$host$endpoint", $data) : Http::withToken($token)->withHeaders(['X-User-Id' => Cookie::get('X-User-Id') ?? null])->$method("$host$endpoint", $data);
}
