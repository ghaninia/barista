<?php

namespace Src\Agenda\User\Domain\Repositories;

use Src\Agenda\User\Domain\Entities\User\User;

interface UserRepositoryInterface
{
    public function findUserByMobile(string $mobile): User;
    public function findUserById(int $userId): User;
}
