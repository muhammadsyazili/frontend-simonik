<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cookie;

function SEMONGKO_services($endpoint, $method, $data = [], $withToken = true)
{
    $host = env('HOST_SEMONGKO');
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

function cast_to_upper($value)
{
    return strtoupper(str_replace('-', ' ', $value));
}
