<?php

namespace Src\Agenda\User\Application\Mappers;

use Src\Agenda\User\Domain\Entities\User\User;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;

class UserMapper
{
    public static function fromEloquent(UserEloquentModel $model): User
    {
        return new User(
            $model->getId(),
            $model->getFirstName(),
            $model->getLastName(),
            $model->getGender(),
            $model->getMobile(),
            $model->getIsActive()
        );
    }
}
