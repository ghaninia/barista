<?php

namespace Src\Agenda\User\Domain\Entities\User\ValueObjects;

use Src\Shared\Domain\ValueObject;

class FirstName extends ValueObject
{
    public function __construct(
        protected ?string $firstname
    ){}

    public function __toString()
    {
        return $this->firstname;
    }

    public function jsonSerialize()
    {
        return $this->firstname;
    }
}
