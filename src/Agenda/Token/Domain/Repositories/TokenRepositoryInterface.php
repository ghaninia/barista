<?php

namespace Src\Agenda\Token\Domain\Repositories;

use Src\Agenda\Token\Application\DTO\CreateTokenDTO;
use Src\Agenda\Token\Application\DTO\ExistsTokenDTO;
use Src\Agenda\Token\Domain\Entities\Token;

interface TokenRepositoryInterface
{
    public function create(CreateTokenDTO $dto): Token;
    public function existsActiveToken(ExistsTokenDTO $dto): bool;
    public function existsDeactivateToken(ExistsTokenDTO $dto): bool;
}
