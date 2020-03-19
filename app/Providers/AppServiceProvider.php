<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ViewErrorBag;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('invalid', function($key) {
            $key = str_replace(['\'', '"'], '', $key);
            $errors = session()->get('errors') ?: new ViewErrorBag();

            if ($message = $errors->first($key)) {
                return "<?php echo '<div class=\"invalid-feedback\">$message</div>'; ?>";
            }
        });

    }
}
