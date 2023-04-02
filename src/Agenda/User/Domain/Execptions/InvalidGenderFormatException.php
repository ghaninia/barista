<?php

namespace Src\Agenda\User\Domain\Execptions;

final class InvalidGenderFormatException extends \DomainException
{
    public function __construct()
    {
        parent::__construct('Gender format is not valid!');
    }
}
