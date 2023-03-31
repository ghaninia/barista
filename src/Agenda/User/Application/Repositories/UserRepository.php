<?php

namespace Src\Agenda\User\Application\Repositories;

use Src\Agenda\User\Application\Mappers\UserMapper;
use Src\Agenda\User\Domain\Entities\User\User;
use Src\Agenda\User\Domain\Execptions\UserNotFoundException;
use Src\Agenda\User\Domain\Repositories\UserRepositoryInterface;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;

class UserRepository implements UserRepositoryInterface
{
    /**
     * @param string $mobile
     * @throws UserNotFoundException
     * @return User
     */
    public function findUserByMobile(string $mobile): User
    {
        $user = UserEloquentModel::query()
            ->whereMobile($mobile)
            ->first();

        !is_null($user)?: throw new UserNotFoundException();

        return UserMapper::fromEloquent($user);
    }

    /**
     * @param int $userId
     * @throws UserNotFoundException
     * @return User
     */
    public function findUserById(int $userId): User
    {
        $user = UserEloquentModel::query()
            ->whereId($userId)
            ->first();

        !is_null($user)?: throw new UserNotFoundException();

        return UserMapper::fromEloquent($user);
    }
}
