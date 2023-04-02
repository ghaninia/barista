<?php

namespace Tests\Unit\src\Agenda\Token\Application\UseCases;

use Src\Agenda\Token\Application\UseCases\Commands\CreateTokenUseCase;
use Src\Agenda\Token\Domain\Entities\Constants\EnumTypeToken;
use Src\Agenda\Token\Domain\Entities\Token;
use Src\Agenda\User\Application\Mappers\UserMapper;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;
use Tests\TestCase;

class CreateTokenTest extends TestCase
{

    /** @test */
    public function createTokenUseCase()
    {
        /** @var UserEloquentModel $user */
        $user = UserEloquentModel::factory()->create();
        $user = UserMapper::fromEloquent($user);
        $token = uniqid();
        $tokenType = EnumTypeToken::AUTH;
        $expiredAt = new \DateTime();

        $result = new CreateTokenUseCase(
            $user, $token, $tokenType, $expiredAt
        );

        $result = $result->execute();
        $this->assertInstanceOf(Token::class, $result);
        $this->assertDatabaseHas('tokens', [
            'user_id' => $user->id,
            'token' => $token,
            'type' => $tokenType->value,
            'user_id' => $user->id,
            'expired_at' => $expiredAt
        ]);
    }
}
