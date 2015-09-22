<?php

/**
 * Freespee integration for Laravel 5.1
 *
 * @license MIT
 * @package SpotOnLive\Navigation
 */

namespace SpotOnLive\Freespee\Providers\Services;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application;
use SpotOnLive\Freespee\Services\FreespeeService;

class FreespeeServiceProvider extends ServiceProvider
{
    /**
     * Publish config
     */
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
        $this->app->bind('SpotOnLive\Freespee\Services\FreespeeService', function (Application $app) {
            if (!$freespeeConfig = config('freespee')) {
                $freespeeConfig = [];
            }

            return new FreespeeService($freespeeConfig);
        });

        $this->mergeConfig();
    }

    /**
     * Merge condfig
     */
    private function mergeConfig()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../../../../config/config.php',
            'freespee'
        );
    }
}
