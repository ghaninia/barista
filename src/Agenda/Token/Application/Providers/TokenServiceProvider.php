<?php

namespace Src\Agenda\Token\Application\Providers;

use Illuminate\Support\ServiceProvider;

class TokenServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \Src\Agenda\Token\Domain\Repositories\TokenRepositoryInterface::class,
            \Src\Agenda\Token\Application\Repositories\TokenRepository::class
        );

        $this->app->bind(
            \Src\Agenda\Token\Domain\Services\TokenServiceInterface::class,
            \Src\Agenda\Token\Application\Repositories\TokenRepository::class
        );
    }
}
