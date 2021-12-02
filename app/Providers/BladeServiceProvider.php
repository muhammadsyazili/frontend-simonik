<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('notEmpty', function ($expression) {
            return "<?php if(!empty({$expression})) : ?>";
        });

        Blade::directive('endNotEmpty', function ($expression) {
            return '<?php endif; ?>';
        });
    }
}
