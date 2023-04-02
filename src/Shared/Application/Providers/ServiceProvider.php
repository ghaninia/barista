<?php

namespace Src\Shared\Application\Providers;

abstract class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    public function registerRoutes(string $routePath)
    {
        $routeFiles = glob(sprintf("%s/*.php", $routePath));
        array_walk($routeFiles, fn($route) => $this->loadRoutesFrom($route));
    }
}
