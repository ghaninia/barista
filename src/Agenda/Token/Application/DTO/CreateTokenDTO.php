<?php

namespace Src\Agenda\Token\Application\DTO;

use Src\Agenda\Token\Domain\Entities\Constants\EnumTypeToken;

class CreateTokenDTO
{

    private int $userId;
    private string $token;
    private string $type;
    private \DateTime $expiredAt;

    public function setUserId(int $userId): static
    {
        $this->userId = $userId;
        return $this;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setToken(string $token): static
    {
        $this->token = $token;
        return $this;
    }

    public function getToken(): string
    {
        return $this->token;
    }

    public function setExpiredAt(\DateTime $expiredAt): static
    {
        $this->expiredAt = $expiredAt;
        return $this;
    }

    public function getExpiredAt(): \DateTime
    {
        return $this->expiredAt;
    }

    public function setType(EnumTypeToken $type): static
    {
        $this->type = $type->value;
        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

}
