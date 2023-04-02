<?php

namespace Src\Agenda\Setting\Domain\Entities;

use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\User\Domain\Entities\User\User;
use Src\Shared\Domain\AggregateRoot;

class Setting extends AggregateRoot
{
    public function __construct(
        public readonly int $id,
        public readonly User $createBy,
        public readonly User $updateBy,
        public readonly EnumKeySetting $key,
        public readonly mixed $value,
        public readonly ?\DateTime $updatedAt,
        public readonly ?\DateTime $createdAt
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'createBy' => $this->createBy->toArray(),
            'updateBy' => $this->updateBy->toArray(),
            'key' => $this->key,
            'value' => $this->value,
            'updatedAt' => $this->updatedAt,
            'createdAt' => $this->createdAt
        ];
    }
}
