<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\PermissionMiddleWare;
class PermissionServiceProvider extends ServiceProvider
{
    protected $routeMiddleware = [
      'admin.permission' => PermissionMiddleware::class,
    ];
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerRouteMiddleware();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function boot()
    {
    
    }

     /**
     * The application's route middleware groups.
     *
     * @var array
     */
    protected function middlewareGroups()
    {
        return [
            'admin' => config('middleware.admin'),
        ];
    }

    protected function registerRouteMiddleware()
    {
         // register route middleware.
        foreach ($this->routeMiddleware as $key => $middleware) {
            app('router')->aliasMiddleware($key, $middleware);
        }
         // register middleware group.
        foreach ($this->middlewareGroups() as $key => $middleware) {
            app('router')->middlewareGroup($key, is_array($middleware) ? array_values($middleware) : array());
        }
    }
}
