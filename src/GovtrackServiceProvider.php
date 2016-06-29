<?php

namespace F2klabs\Govtrack;

use Illuminate\Support\ServiceProvider;

class GovtrackServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(array(__DIR__.'/../config/config.php'=> config_path('govtrack.php')));

        if(isset($_ENV['f2k.workbench']))
            require __DIR__ . '/../vendor/autoload.php';
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
