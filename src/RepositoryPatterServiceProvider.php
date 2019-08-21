<?php

namespace Salman\RepositoryPattern;

use Illuminate\Support\ServiceProvider;
use Salman\RepositoryPattern\Commands\RepositoryPattern;

class RepositoryPatterServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
//        $this->mergeConfigFrom(__DIR__.'/config/RepositoryConfig.php','RepositoryPattern');

        $this->loadViewsFrom(__DIR__.'/resources/stubs', 'RepositoryPattern');

        $this->publishes([
            __DIR__.'/resources/stubs' => resource_path('vendor/salmanzafar/stubs'),
//            __DIR__.'/config/RepositoryConfig.php' => config_path('RepositoryConfig.php'),

        ]);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->commands([
            RepositoryPattern::class,
        ]);
    }
}
