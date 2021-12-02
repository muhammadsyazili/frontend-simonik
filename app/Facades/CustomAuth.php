<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static bool attempt($username, $password)
 * @method static bool check()
 * @method static mixed getErrorMessage()
 * @method static mixed getErrors()
 * @method static void logout()
 *
 * @see \App\Repositories\CustomAuthManager
 */
class CustomAuth extends Facade {
    protected static function getFacadeAccessor() { return 'App\Repositories\CustomAuthManager'; }
}
