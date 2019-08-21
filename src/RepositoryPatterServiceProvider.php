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
        $this->loadViewsFrom(__DIR__.'/resources/stubs', 'RepositoryPattern');

        $this->publishes([
            __DIR__.'/resources/stubs' => resource_path('vendor/salmanzafar/stubs'),
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
