<?php

namespace Src\Agenda\User\Domain\Entities\User;

use Src\Agenda\User\Domain\Entities\User\ValueObjects\FirstName;
use Src\Agenda\User\Domain\Entities\User\ValueObjects\Gender;
use Src\Agenda\User\Domain\Entities\User\ValueObjects\LastName;
use Src\Agenda\User\Domain\Entities\User\ValueObjects\Mobile;
use Src\Common\Domain\AggregateRoot;

class User extends AggregateRoot
{
    public function __construct(
        public readonly ?int $id,
        public readonly FirstName $firstName,
        public readonly LastName $lastName,
        public readonly Gender $gender,
        public readonly Mobile $mobile,
        public readonly bool $isActive = true
    ) {}

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'isActive' => $this->isActive,
            'firstName' => $this->firstName,
            'lastName' => $this->lastName,
            'gender' => $this->gender->value,
            'mobile' => $this->mobile,
        ];
    }

}
