<?php

namespace Src\Agenda\Token\Application\UseCases\Commands;

use Src\Agenda\Token\Application\Mappers\TokenMapper;
use Src\Agenda\Token\Domain\Entities\Token;
use Src\Agenda\Token\Domain\Repositories\TokenRepositoryInterface;
use Src\Agenda\Token\Domain\Entities\Constants\EnumTypeToken;
use Src\Agenda\Token\Application\DTO\CreateTokenDTO;
use Src\Agenda\User\Domain\Entities\User\User;
use Src\Shared\Domain\CommandInterface;

class CreateTokenUseCase implements CommandInterface
{
    private TokenRepositoryInterface $repository;

    public function __construct(
        private readonly User $user,
        private readonly string $token,
        private readonly EnumTypeToken $type,
        private readonly \DateTime $expiredAt,
    ) {
        $this->repository = app(TokenRepositoryInterface::class);
    }

    public function execute(): Token
    {
        return $this->repository->create(
            (new CreateTokenDTO())
                ->setToken($this->token)
                ->setUserId($this->user->id)
                ->setType($this->type)
                ->setExpiredAt($this->expiredAt)
        );
    }
}
