<?php

namespace Src\Agenda\User\Domain\Entities\User\Constants;

enum EnumPermission: string {
    case TOKEN_INDEX = 'token.index';
    case TOKEN_STORE = 'token.store';
    case TOKEN_SHOW = 'token.delete';
    case TOKEN_DESTROY = 'token.destroy';
    case TOKEN_UPDATE = 'token.update';
}
