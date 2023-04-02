<?php

namespace Src\Agenda\Token\Application\DTO;

use Src\Agenda\Token\Domain\Entities\Constants\EnumTypeToken;

class ExistsTokenDTO
{
    private string $type;
    private int $userId;

    public function setType(EnumTypeToken $type)
    {
        $this->type = $type->value;
        return $this;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setUserId(int $userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function getUserId()
    {
        return $this->userId;
    }
}
