<?php

namespace Tests\Unit\src\Agenda\Token\Infrastructure\EloquentModels;

use Src\Agenda\Token\Infrastructure\EloquentModels\TokenEloquentModel;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;
use Tests\TestCase;

class TokenEloquentModelTest extends TestCase
{
    /** @test */
    public function userRelationalOfTokenModel()
    {
        $token = TokenEloquentModel::factory()
            ->for(
                UserEloquentModel::factory(),
                "user"
            )->create();

        $this->assertDatabaseCount('tokens', 1);
        $this->assertDatabaseHas('tokens', [
            'token' => $token->getToken(),
            'type' => $token->getType(),
        ]);
    }

}
