<?php

use Illuminate\Support\Facades\Http;

function defaultQueryParams()
{
    $query = null;
    if (is_null(request()->query('level'))) {
        if ($_COOKIE['X-Role'] === 'super-admin') {
            $query['level'] = 'super-master';
        } else if ($_COOKIE['X-Role'] === 'admin') {
            $query['level'] = $_COOKIE['X-Level'];
            $query['unit'] = 'master';
            $query['tahun'] = now()->year;
        } else {
            $query['level'] = $_COOKIE['X-Level'];
            $query['unit'] = $_COOKIE['X-Unit'];
            $query['tahun'] = now()->year;
        }
    } else {
        $query['level'] = request()->query('level');
        $query['unit'] = request()->query('unit');
        $query['tahun'] = request()->query('tahun');
    }

    return $query;
}

function callSIMONIK_Sevices($endpoint, $method, $data = [], $withToken = true)
{
    $host = env('HOST_SIMONIK');
    $token = $_COOKIE['X-Token'] ?? null;

    return $withToken === false ? Http::$method("$host$endpoint", $data) : Http::withToken($token)->withHeaders(['X-User-Id' => $_COOKIE['X-User-Id'] ?? null])->$method("$host$endpoint", $data);
}

function callFDX_Sevices($endpoint, $method, $data = [], $withToken = true)
{
    $host = env('HOST_FDX');
    $token = $_COOKIE['X-Token'] ?? null;

    return $withToken === false ? Http::$method("$host$endpoint", $data) : Http::withToken($token)->withHeaders(['X-User-Id' => $_COOKIE['X-User-Id'] ?? null])->$method("$host$endpoint", $data);
}
