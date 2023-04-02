<?php

namespace Src\Agenda\Setting\Application\Providers;

use Src\Shared\Application\Providers\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->registerRoutes(base_path('src/Agenda/Setting/Presentation/HTTP/Routes'));
    }

    public function register()
    {
        $this->app->bind(
            \Src\Agenda\Setting\Domain\Repositories\SettingRepositoryInterface::class,
            \Src\Agenda\Setting\Application\Repositories\SettingRepository::class
        );

        $this->app->bind(
            \Src\Agenda\Setting\Domain\Services\SettingServiceInterface::class,
            \Src\Agenda\Setting\Application\Services\SettingService::class
        );
    }
}
