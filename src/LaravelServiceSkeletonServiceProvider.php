<?php

namespace mo3golom\LaravelServiceSkeleton;

use mo3golom\LaravelServiceSkeleton\Console\MakeSkeleton;
use Illuminate\Support\ServiceProvider;

class LaravelServiceSkeletonServiceProvider extends ServiceProvider
{

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                MakeSkeleton::class,
            ]);
        }
    }

    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->mergeConfigFrom(__DIR__ . '/../config/serviceSkeleton.php', 'service-skeleton');

            $this->publishes([
                __DIR__ . '/../config/serviceSkeleton.php' => config_path('serviceSkeleton.php'),
            ], 'service-skeleton');
        }
    }
}
