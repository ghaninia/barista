<?php

namespace Src\Agenda\Token\Application\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \Src\Agenda\Token\Domain\Repositories\TokenRepositoryInterface::class,
            \Src\Agenda\Token\Application\Repositories\TokenRepository::class
        );
    }
}
