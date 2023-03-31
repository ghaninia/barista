<?php

namespace Src\Agenda\User\Application\UseCases\Queries;

use Src\Agenda\User\Domain\Repositories\UserRepositoryInterface;
use Src\Common\Domain\QueryInterface;

class FindByIdQuery implements QueryInterface
{
    private UserRepositoryInterface $repository;
    public function __construct(
        private int $userId
    ) {
        $this->repository = app()->make(UserRepositoryInterface::class);
    }

    public function handle(): mixed {
        return $this->repository->findUserById($this->userId);
    }
}
