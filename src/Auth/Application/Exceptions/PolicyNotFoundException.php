<?php

namespace Src\Auth\Application\Exceptions;

class PolicyNotFoundException extends \DomainException
{
    public function __construct(string $message = 'Policy not found')
    {
        parent::__construct($message);
    }
}
