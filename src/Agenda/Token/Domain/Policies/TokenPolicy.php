<?php

namespace Src\Agenda\Token\Domain\Policies;

use Src\Agenda\Token\Domain\Policies\Enums\EnumTokenPolicy;
use Src\Shared\Domain\PolicyInterface;

class TokenPolicy implements PolicyInterface
{
    public function mapper()
    {
        return [
            'getAllTokens'      => EnumTokenPolicy::TOKEN_INDEX,
            'createNewToken'    => EnumTokenPolicy::TOKEN_STORE,
            'showToken'         => EnumTokenPolicy::TOKEN_SHOW,
            'updateToken'       => EnumTokenPolicy::TOKEN_UPDATE,
            'deleteToken'       => EnumTokenPolicy::TOKEN_DESTROY
        ];
    }

    public function getAllTokens(): bool
    {
        return true;
    }

    public function createNewToken(): bool
    {
        return true;
    }

    public function showToken(): bool
    {
        return true;
    }

    public function updateToken(): bool
    {
        return true;
    }

    public function deleteToken(): bool
    {
        return true;
    }
}
