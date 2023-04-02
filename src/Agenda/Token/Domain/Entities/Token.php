<?php

namespace Src\Agenda\Token\Domain\Entities;

use Src\Agenda\User\Domain\Entities\User\User;
use Src\Shared\Domain\AggregateRoot;

class Token extends AggregateRoot
{

    public function __construct(
        public readonly int $id,
        public readonly User $user,
        public readonly string $token,
        public readonly string $type,
        public readonly \DateTime $expiredAt
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'user' => $this->user,
            'type' => $this->type,
            'token' => $this->token,
            'expiredAt' => $this->expiredAt
        ];
    }
}
