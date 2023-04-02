<?php

namespace Src\Agenda\Token\Application\Mappers;

use Src\Agenda\Token\Domain\Entities\Token;
use Src\Agenda\Token\Infrastructure\EloquentModels\TokenEloquentModel;
use Src\Agenda\User\Application\Mappers\UserMapper;
use Src\Agenda\User\Domain\Entities\User\User;

class TokenMapper
{
    public static function fromEloquent(TokenEloquentModel $model): Token
    {
        return new Token(
            $model->getId(),
            UserMapper::fromEloquent($model->getUser()),
            $model->getToken(),
            $model->getType(),
            $model->getExpiredAt()
        );
    }
}
