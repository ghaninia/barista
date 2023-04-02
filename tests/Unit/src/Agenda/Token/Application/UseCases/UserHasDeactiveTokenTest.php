<?php

namespace Tests\Unit\src\Agenda\Token\Application\UseCases;

use Src\Agenda\Token\Application\UseCases\Queries\UserHasNotActiveTokenUseCase;
use Src\Agenda\Token\Domain\Entities\Constants\EnumTypeToken;
use Src\Agenda\Token\Infrastructure\EloquentModels\TokenEloquentModel;
use Src\Agenda\User\Application\Mappers\UserMapper;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;
use Tests\TestCase;

class UserHasDeactiveTokenTest extends TestCase
{
    /** @test */
    public function UserHasActiveTokenUseCase()
    {
        $type = EnumTypeToken::AUTH;
        $token = TokenEloquentModel::factory()
            ->state([
                'type' => $type->value,
                'expired_at' => new \DateTime("-1 minutes")
            ])
            ->for(
                UserEloquentModel::factory(), 'user'
            )
            ->create();

        $user = UserMapper::fromEloquent($token->getUser());
        $result = new UserHasNotActiveTokenUseCase($user, $type);
        $this->assertTrue($result->handle());
    }
}
