<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class CustomAuthManager
{

    private ?string $errorMessage = null;
    private mixed $errors = null;
    private const SECRET_KEY = 'yMneUju4qMhNP2MwyL4xur79AFGhZsB6';

    public function attempt($username, $password, $app): bool
    {
        $response = null;

        switch ($app) {
            case "semongko":
                $response = SEMONGKO_services('/login', 'post', ['username' => $username, 'password' => $password], false);
                break;
            case "fdx":
                $response = FDX_services('/login', 'post', ['username' => $username, 'password' => $password], false);
                break;
            default:
                return false;
        }

        if ($response->clientError()) {
            $this->errors = $response->object()->errors;
            return false;
        }

        if ($response->serverError()) {
            $this->errorMessage = Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR];
            return false;
        }

        Cookie::queue(Cookie::make('X-Token', $response->object()->data->token, time() + (60 * 60 * 24 * 30)));
        Cookie::queue(Cookie::make('X-User-Id', $response->object()->data->id, time() + (60 * 60 * 24 * 30)));
        Cookie::queue(Cookie::make('X-Username', $response->object()->data->username, time() + (60 * 60 * 24 * 30)));
        Cookie::queue(Cookie::make('X-Role', $response->object()->data->role, time() + (60 * 60 * 24 * 30)));
        Cookie::queue(Cookie::make('X-Level', $response->object()->data->level, time() + (60 * 60 * 24 * 30)));
        Cookie::queue(Cookie::make('X-Unit', $response->object()->data->unit, time() + (60 * 60 * 24 * 30)));
        Cookie::queue(Cookie::make('X-App', $app, time() + (60 * 60 * 24 * 30)));
        Cookie::queue(Cookie::make('X-Credential', hash('sha256', self::SECRET_KEY . $response->object()->data->id . $response->object()->data->token), time() + (60 * 60 * 24 * 30)));

        return true;
    }

    public function check(): bool
    {
        if (is_null(Cookie::get('X-User-Id')) || is_null(Cookie::get('X-Token')) || is_null(Cookie::get('X-Credential'))) {
            return false;
        } else {
            $id = Cookie::get('X-User-Id') ?? null;
            $token = Cookie::get('X-Token') ?? null;
            $credential = Cookie::get('X-Credential') ?? null;

            return hash('sha256', self::SECRET_KEY . $id . $token) == $credential ? true : false;
        }
    }

    public function destroy(): bool
    {
        if (!is_null(Cookie::get('X-Token'))) {
            if (Cookie::get('X-App') === 'semongko') {
                $response = SEMONGKO_services('/logout', 'get');
            } else if (Cookie::get('X-App') === 'fdx') {
                $response = FDX_services('/logout', 'get');
            }

            Cookie::queue(Cookie::forget('X-Token'));
            Cookie::queue(Cookie::forget('X-User-Id'));
            Cookie::queue(Cookie::forget('X-Username'));
            Cookie::queue(Cookie::forget('X-Role'));
            Cookie::queue(Cookie::forget('X-Level'));
            Cookie::queue(Cookie::forget('X-Unit'));
            Cookie::queue(Cookie::forget('X-App'));
            Cookie::queue(Cookie::forget('X-Credential'));

            Session::flush();

            if ($response->serverError()) {
                $this->errorMessage = Response::$statusTexts[Response::HTTP_INTERNAL_SERVER_ERROR];
                return false;
            }
        }

        Session::flush();

        return true;
    }

    public function getErrorMessage(): ?string
    {
        return $this->errorMessage;
    }

    public function getErrors(): mixed
    {
        return $this->errors;
    }
}
