<?php

namespace Src\Agenda\User\Domain\Entities\User\ValueObjects;

use Src\Agenda\User\Domain\Execptions\PasswordsDoNotMatchException;
use Src\Agenda\User\Domain\Execptions\PasswordTooShortException;
use Src\Common\Domain\ValueObject;

class Password extends ValueObject
{
    public readonly ?string $value;

    public function __construct(?string $password, ?string $confirmation)
    {
        if ($password && strlen($password) < 8) {
            throw new PasswordTooShortException();
        }

        if ($password !== $confirmation) {
            throw new PasswordsDoNotMatchException();
        }

        $this->value = $password;
    }

    public static function fromString(string $password, string $confirmation): self
    {
        return new self($password, $confirmation);
    }

    public function isNotEmpty(): bool
    {
        return $this->value !== null;
    }

    public function jsonSerialize(): string
    {
        return '';
    }
}
