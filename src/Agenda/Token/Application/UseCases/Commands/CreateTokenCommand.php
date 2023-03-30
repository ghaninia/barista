<?php

namespace Src\Agenda\Token\Application\UseCases\Commands;

use Src\Agenda\Token\Domain\Entities\Constants\EnumTypeToken;
use Src\Agenda\Token\Domain\Repositories\TokenRepositoryInterface;
use Src\Agenda\Token\Application\DTO\CreateTokenDTO;
use Src\Agenda\User\Domain\Entities\User\User;
use Src\Common\Domain\CommandInterface;

class CreateTokenCommand implements CommandInterface
{
    private TokenRepositoryInterface $repository;

    public function __construct(
        private readonly User $user,
        private readonly string $token,
        private readonly EnumTypeToken $type,
        private readonly \DateTime $expiredAt,
    ) {
        $this->repository = app()->make(TokenRepositoryInterface::class);
    }

    public function execute()
    {
        $this->repository->create(
            (new CreateTokenDTO())
                ->setToken($this->token)
                ->setUserId($this->user->id)
                ->setType($this->type)
                ->setExpiredAt($this->expiredAt)
        );
    }
}
