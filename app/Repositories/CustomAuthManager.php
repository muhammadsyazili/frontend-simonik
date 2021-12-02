<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Session;

class CustomAuthManager {

    private ?string $errorMessage = null;
    private mixed $errors = null;
    private const SECRET_KEY = 'yMneUju4qMhNP2MwyL4xur79AFGhZsB6';

    public function attempt($username, $password, $app) : bool
    {
        $response = null;

        switch ($app) {
            case "simonik":
                $response = callSIMONIK_Sevices('/login', 'post', ['username' => $username, 'password' => $password], false);
                break;
            case "fdx":
                $response = callFDX_Sevices('/login', 'post', ['username' => $username, 'password' => $password], false);
                break;
            default:
                return false;
        }

        if ($response->clientError()) {
            $this->errorMessage = $response->object()->message;
            $this->errors = $response->object()->errors;

            return false;
        }

        if ($response->serverError()) {
            $this->errorMessage = $response->object()->message;
            $this->errors = null;

            return false;
        }

        setcookie('X-Token', $response->object()->data->token, time() + (60 * 60 * 24 * 30), "/");
        setcookie('X-User-Id', $response->object()->data->id, time() + (60 * 60 * 24 * 30), "/");
        setcookie('X-Username', $response->object()->data->username, time() + (60 * 60 * 24 * 30), "/");
        setcookie('X-Role', $response->object()->data->role, time() + (60 * 60 * 24 * 30), "/");
        setcookie('X-Level', $response->object()->data->level, time() + (60 * 60 * 24 * 30), "/");
        setcookie('X-Unit', $response->object()->data->unit, time() + (60 * 60 * 24 * 30), "/");
        setcookie('X-App', $app, time() + (60 * 60 * 24 * 30), "/");
        setcookie('X-Credential', hash('sha256', self::SECRET_KEY.$response->object()->data->id.$response->object()->data->token), time() + (60 * 60 * 24 * 30), "/");

        return true;
    }

    public function check() : bool
    {
        $id = $_COOKIE['X-User-Id'] ?? null;
        $token = $_COOKIE['X-Token'] ?? null;
        $credential = $_COOKIE['X-Credential'] ?? null;

        return hash('sha256', self::SECRET_KEY.$id.$token) == $credential ? true : false;
    }

    public function destroy() : bool
    {
        if ($_COOKIE['X-App'] === 'simonik') {
            $response = callSIMONIK_Sevices('/logout', 'get');
        } else if ($_COOKIE['X-App'] === 'fdx') {
            $response = callFDX_Sevices('/logout', 'get');
        } else {
            return false;
        }

        if ($response->clientError()) {
            $this->errorMessage = $response->object()->message;
            $this->errors = $response->object()->errors;

            return false;
        }

        if ($response->serverError()) {
            $this->errorMessage = $response->object()->message;
            $this->errors = null;

            return false;
        }

        setcookie('X-Token', '', 1, "/");
        setcookie('X-User-Id', '', 1, "/");
        setcookie('X-Username', '', 1, "/");
        setcookie('X-Role', '', 1, "/");
        setcookie('X-Level', '', 1, "/");
        setcookie('X-Unit', '', 1, "/");
        setcookie('X-App', '', 1, "/");
        setcookie('X-Credential', '', 1, "/");

        Session::flush();

        return true;
    }

    public function getErrorMessage() : ?string
    {
        return $this->errorMessage;
    }

    public function getErrors() : mixed
    {
        return $this->errors;
    }
}
