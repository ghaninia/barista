<?php

namespace Src\Agenda\User\Domain\Entities\User\ValueObjects;

use Src\Agenda\User\Domain\Entities\User\Constants\EnumUserGender;
use Src\Common\Domain\ValueObject;

class Gender extends ValueObject
{

    public function __construct(protected ?EnumUserGender $gender){}

    public function __toString()
    {
        return $this->gender->value;
    }

    public function jsonSerialize()
    {
        return $this->gender->value;
    }
}
