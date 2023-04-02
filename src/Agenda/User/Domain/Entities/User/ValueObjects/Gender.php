<?php

namespace Src\Agenda\User\Domain\Entities\User\ValueObjects;

use Src\Agenda\User\Domain\Entities\User\Constants\EnumUserGender;
use Src\Shared\Domain\ValueObject;

class Gender extends ValueObject
{

    public function __construct(protected ?string $gender) {
        $this->isValid();
    }

    private function isValid()
    {
        $result = false;

        foreach (EnumUserGender::cases() as $gender) {
            $result = $result || $gender->value == $this->gender;
        }

        $result ?: throw new InvalidGenderFormatException();
    }

    public function __toString()
    {
        return $this->gender->value;
    }

    public function jsonSerialize()
    {
        return $this->gender->value;
    }
}
