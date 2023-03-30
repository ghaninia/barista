<?php

namespace Src\Auth\Application;

use Src\Auth\Domain\AuthInterface;
use Src\Agenda\User\Domain\Entities\User\User;

class JWTAuth implements AuthInterface
{

    public function login(array $credentials): string
    {
    }

    public function logout(): void
    {
    }

    public function me(): User
    {
    }

    public function refresh(): string
    {
    }
}

