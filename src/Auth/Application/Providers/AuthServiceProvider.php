<?php

namespace Src\Auth\Application\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        $this->registerRoutes();
    }

    public function register()
    {
        $this->app->bind(
            \Src\Auth\Domain\AuthInterface::class,
            \Src\Auth\Application\JWTAuth::class
        );
    }

    public function registerRoutes()
    {
        $routePath = base_path('src/Auth/Presentation/HTTP/Routes');
        $routeFiles = glob(sprintf("%s/*.php", $routePath));
        array_walk($routeFiles, fn($route) => $this->loadRoutesFrom($route));
    }

}
