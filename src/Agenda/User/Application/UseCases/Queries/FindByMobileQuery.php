<?php

namespace Src\Agenda\User\Application\UseCases\Queries;

use Src\Agenda\User\Domain\Repositories\UserRepositoryInterface;
use Src\Common\Domain\QueryInterface;

class FindByMobileQuery implements QueryInterface
{
    private UserRepositoryInterface $repository;
    public function __construct(
        private string $mobileNumber
    ) {
        $this->repository = app()->make(UserRepositoryInterface::class);
    }

    public function handle(): mixed {
        return $this->repository->findUserByMobile($this->mobileNumber);
    }
}
