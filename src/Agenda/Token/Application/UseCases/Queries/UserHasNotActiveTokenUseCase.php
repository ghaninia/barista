<?php

namespace Src\Agenda\Token\Application\UseCases\Queries;

use Src\Agenda\Token\Domain\Repositories\TokenRepositoryInterface;
use Src\Agenda\Token\Domain\Entities\Constants\EnumTypeToken;
use Src\Agenda\Token\Application\DTO\ExistsTokenDTO;
use Src\Agenda\User\Domain\Entities\User\User;
use Src\Shared\Domain\QueryInterface;

class UserHasNotActiveTokenUseCase implements QueryInterface
{
    private TokenRepositoryInterface $repository;
    public function __construct(
        private readonly User $user,
        private readonly EnumTypeToken $type,
    ) {
        $this->repository = app()->make(TokenRepositoryInterface::class);
    }

    public function handle(): mixed
    {
        return $this->repository->existsDeactivateToken(
            (new ExistsTokenDTO())
                ->setUserId($this->user->id)
                ->setType($this->type)
        );
    }
}
