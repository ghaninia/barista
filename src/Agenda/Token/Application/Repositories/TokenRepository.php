<?php

namespace Src\Agenda\Token\Application\Repositories;
use Src\Agenda\Token\Application\DTO\CreateTokenDTO;
use Src\Agenda\Token\Application\Mappers\TokenMapper;
use Src\Agenda\Token\Domain\Repositories\TokenRepositoryInterface;
use Src\Agenda\Token\Infrastructure\EloquentModels\TokenEloquentModel;
use Src\Agenda\User\Domain\Entities\Token;

class TokenRepository implements TokenRepositoryInterface
{
    public function create(CreateTokenDTO $dto): Token
    {
        $token = TokenEloquentModel::create([
            'user_id' => $dto->getUserId(),
            'token' => $dto->getToken(),
            'type' => $dto->getType(),
            'expired_at' => $dto->getExpiredAt()
        ]);

        return TokenMapper::fromEloquent($token);
    }
}
