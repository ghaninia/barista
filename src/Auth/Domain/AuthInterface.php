<?php

namespace Src\Auth\Domain;

use Illuminate\Auth\AuthenticationException;
use Src\Agenda\User\Domain\Entities\User\User;

interface AuthInterface
{
    /**
     * @throws AuthenticationException
     */
    public function login(array $credentials): string;
    /**
     * @throws AuthenticationException
     */
    public function refresh(): string;

    public function logout(): void;
    public function me(): User;
}
