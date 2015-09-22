<?php

/**
 * Dynamic navigations for Laravel 5.1
 *
 * @license MIT
 * @package SpotOnLive\Navigation
 */

namespace SpotOnLive\Freespee\Providers\Services;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application;
use SpotOnLive\Freespee\Services\FreespeeService;

class NavigationServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../../../../config/config.php' => config_path('freespee.php'),
        ]);
    }

    /**
     * Register service
     */
    public function register()
    {
        $this->app->bind('SpotOnLive\Navigation\Services\NavigationService', function (Application $app) {
            if (!$freespeeConfig = config('freespee')) {
                $freespeeConfig = [];
            }

            return new FreespeeService($freespeeConfig);
        });

        $this->mergeConfig();
    }

    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../../../config/config.php',
            'freespee'
        );
    }
}
