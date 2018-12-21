<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('sysinfo', function () {
            return Cache::remember('sysinfo', (24 * 60), function () {
                $file = file_get_contents(base_path('/composer.json'));
                $content = json_decode($file, true);

                $html = sprintf(
                    '<span class="sysinfo">%s</span>',
                    array_get($content, 'version', '0.0.0')
                );

                return $html;
            });
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
