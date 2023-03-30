<?php

namespace Src\Agenda\Token\Domain\Repositories;

use Src\Agenda\Token\Application\DTO\CreateTokenDTO;
use Src\Agenda\User\Domain\Entities\Token;

interface TokenRepositoryInterface
{
    public function create(CreateTokenDTO $dto): Token;
}
