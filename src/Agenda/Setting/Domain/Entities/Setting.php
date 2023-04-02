<?php

namespace Src\Agenda\Setting\Domain\Entities;

use Src\Shared\Domain\AggregateRoot;

class Setting extends AggregateRoot
{
    public function __construct(
        public readonly int $id,
        public readonly ?int $createById,
        public readonly ?int $updateById,
        public readonly string $key,
        public readonly mixed $value,
        public readonly ?\DateTime $updatedAt,
        public readonly ?\DateTime $createdAt
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'createById' => $this->createById,
            'updateById' => $this->updateById,
            'key' => $this->key,
            'value' => $this->value,
            'updatedAt' => $this->updatedAt,
            'createdAt' => $this->createdAt
        ];
    }
}
