<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

function SEMONGKO_services($endpoint, $method, $data = [], $withToken = true)
{
    // $host = env('HOST_SEMONGKO');
    $host = SEMONGKO_backend_host();
    $token = Cookie::get('X-Token') ?? null;

    return $withToken === false ?
        Http::$method("$host$endpoint", $data) :
        Http::withToken($token)->withHeaders(['X-User-Id' => Cookie::get('X-User-Id') ?? null])->$method("$host$endpoint", $data);
}

function FDX_services($endpoint, $method, $data = [], $withToken = true)
{
    $host = env('HOST_FDX');
    $token = Cookie::get('X-Token') ?? null;

    return $withToken === false ?
        Http::$method("$host$endpoint", $data) :
        Http::withToken($token)->withHeaders(['X-User-Id' => Cookie::get('X-User-Id') ?? null])->$method("$host$endpoint", $data);
}

function cast_to_upper($value, $default = '', $prefix = '', $postfix = '')
{
    return is_null($value) ? $default : $prefix . strtoupper(str_replace('-', ' ', $value)) . $postfix;
}

function SEMONGKO_backend_host(): string
{
    return json_decode(file_get_contents(storage_path("host/semongko_backend.json")), true)['host'];
}
