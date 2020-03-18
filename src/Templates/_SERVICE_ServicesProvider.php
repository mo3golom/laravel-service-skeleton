<?php

namespace App\Services\_SERVICE_;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class _SERVICE_ServicesProvider extends ServiceProvider
{
    protected $namespace = 'App\Services\_SERVICE_\Http\Controller';

    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->loadMigrationsFrom(__DIR__ . '/Database/Migrations');
        }

        parent::boot();
    }

    public function map()
    {
        $this->mapRoutes();
    }

    protected function mapRoutes()
    {
        \Route::middleware('api')
            ->prefix('api')
            ->namespace($this->namespace)
            ->group(base_path('app/_ROOT_/_SERVICE_/Routes/api.php'));
    }
}
