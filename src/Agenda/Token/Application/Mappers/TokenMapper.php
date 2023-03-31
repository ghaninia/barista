<?php

namespace Src\Agenda\Token\Application\Mappers;

use Src\Agenda\Token\Infrastructure\EloquentModels\TokenEloquentModel;
use Src\Agenda\User\Domain\Entities\Token;

class TokenMapper
{
    public static function fromEloquent(TokenEloquentModel $model): Token
    {
        return new Token(
            $model->getId(),
            $model->getToken(),
            $model->getType(),
            $model->getExpiredAt()
        );
    }
}
