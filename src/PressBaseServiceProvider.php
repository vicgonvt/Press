<?php

namespace vicgonvt\Press;

use Illuminate\Support\ServiceProvider;

class PressBaseServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerResources();
    }

    public function register()
    {
        $this->commands([
            Console\ProcessCommand::class,
        ]);
    }

    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
    }
}