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
        //
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
