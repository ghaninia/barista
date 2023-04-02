<?php

namespace Tests\Unit\src\Agenda\Token\Domain;

use Src\Agenda\Token\Infrastructure\EloquentModels\TokenEloquentModel;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;
use Src\Agenda\User\Application\Mappers\UserMapper;
use Src\Agenda\Token\Domain\Entities\Token;
use Tests\TestCase;

class TokenDomainTest extends TestCase
{
    /** @test */
    public function tokenDomain()
    {
        /** @var TokenEloquentModel $token */
        $token = TokenEloquentModel::factory()
            ->for(
                UserEloquentModel::factory(), 'user'
            )
            ->create();

        $token = new Token(
            $token->getId(),
            UserMapper::fromEloquent($token->getUser()),
            $token->getToken(),
            $token->getType(),
            $token->getExpiredAt()
        );

        $this->assertInstanceOf(Token::class, $token);

    }
}
