<?php

namespace Src\Agenda\Token\Application\Repositories;

use Src\Agenda\User\Domain\Entities\Token;
use Src\Agenda\Token\Application\DTO\CreateTokenDTO;
use Src\Agenda\Token\Application\DTO\ExistsTokenDTO;
use Src\Agenda\Token\Application\Mappers\TokenMapper;
use Src\Agenda\Token\Domain\Repositories\TokenRepositoryInterface;
use Src\Agenda\Token\Infrastructure\EloquentModels\TokenEloquentModel;

class TokenRepository implements TokenRepositoryInterface
{
    /**
     * @param CreateTokenDTO $dto
     * @return Token
     */
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

    /**
     * @param ExistsTokenDTO $dto
     * @return bool
     */
    public function existsActiveToken(ExistsTokenDTO $dto): bool
    {
        return TokenEloquentModel::query()
            ->whereUserId($dto->getUserId())
            ->whereType($dto->getType())
            ->where('expired_at', ">=", new \DateTime())
            ->exists();
    }

    /**
     * @param ExistsTokenDTO $dto
     * @return bool
     */
    public function existsDeactivateToken(ExistsTokenDTO $dto): bool
    {
        return TokenEloquentModel::query()
            ->whereUserId($dto->getUserId())
            ->whereType($dto->getType())
            ->where('expired_at', "<", new \DateTime())
            ->exists();
    }
}
