# Laravel Repositories

Laravel Repositories - это пакет для Laravel 5, который используется для абстрагирования слоя базы данных.

## Установка

Выполнить команду в консоли:


 ```bash
 composer require mo3golom/laravel-service-skeleton
 ```


## Использование

Выполнить в консоли

```bash
php artisan services:skeleton SERVICE_NAME
```

Будет создан сервис в папке app/Services со следующей структурой

```
SERVICE_NAME
├── Database
|   ├── Migrations
|   ├── Models
|   ├── Repository
|   └── Seeds
├── Http
|   ├── Controller
|   ├── Middleware
|   └── Requests
├── Routes
|   └── api.php
└── SERVICE_NAMEServicesProvider.php
```

Чтобы изменить папку с Services на другую, выполните:
```bash
php artisan vendor:publish
```
и претащите конфигурацию в /config


Вид сервис провайдера
```php
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
            ->group(base_path('_ROOT_/_SERVICE_/Routes/api.php'));
    }
}
```

Вид файла роута api.php
```php
<?php

Route::middleware('auth:api')->prefix('v1')->group(function () {

});
```