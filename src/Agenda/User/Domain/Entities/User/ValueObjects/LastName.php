<?php

namespace Src\Agenda\User\Domain\Entities\User\ValueObjects;

use Src\Common\Domain\ValueObject;

class LastName extends ValueObject
{
    public function __construct(
        protected ?string $lastName
    ){}

    public function __toString()
    {
        return $this->lastName;
    }

    public function jsonSerialize()
    {
        return $this->lastName;
    }
}
