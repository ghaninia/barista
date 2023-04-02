<?php

namespace Src\Agenda\User\Application\Mappers;

use Src\Agenda\User\Domain\Entities\User\User;
use Src\Agenda\User\Domain\Entities\User\ValueObjects\FirstName;
use Src\Agenda\User\Domain\Entities\User\ValueObjects\Gender;
use Src\Agenda\User\Domain\Entities\User\ValueObjects\LastName;
use Src\Agenda\User\Domain\Entities\User\ValueObjects\Mobile;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;

class UserMapper
{
    public static function fromEloquent(UserEloquentModel $model): User
    {
        return new User(
            $model->getId(),
            new FirstName($model->getFirstName()),
            new LastName($model->getLastName()),
            new Gender($model->getGender()),
            new Mobile($model->getMobile()),
            $model->getIsActive()
        );
    }
}
