<?php

namespace Src\Agenda\User\Domain\Entities;

use Src\Common\Domain\AggregateRoot;

class Token extends AggregateRoot
{

    public function __construct(
        public readonly int $id,
        public readonly string $token,
        public readonly string $type,
        public readonly \DateTime $expiredAt
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'type' => $this->type,
            'token' => $this->token,
            'expiredAt' => $this->expiredAt
        ];
    }
}
