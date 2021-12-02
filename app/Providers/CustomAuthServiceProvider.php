<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class CustomAuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('authx', function(){
            return new \App\Repositories\CustomAuthManager();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
