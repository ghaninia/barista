<?php

namespace Src\Auth\Application\Exceptions;

class MethodPolicyNotFound extends \DomainException
{
    public function __construct(string $message = 'Method policy not found')
    {
        parent::__construct($message);
    }
}
