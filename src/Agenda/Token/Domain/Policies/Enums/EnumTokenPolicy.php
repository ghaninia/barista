<?php

namespace Src\Agenda\Token\Domain\Policies\Enums;

use Src\Shared\Domain\PermissionInterface;

enum EnumTokenPolicy: string implements PermissionInterface
{
    case TOKEN_INDEX = 'token.index';
    case TOKEN_STORE = 'token.store';
    case TOKEN_SHOW = 'token.show';
    case TOKEN_DESTROY = 'token.destroy';
    case TOKEN_UPDATE = 'token.update';
}
