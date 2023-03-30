<?php

namespace Tests\Unit\src\Agenda\Infrastructure\EloquentModels;

use Src\Agenda\User\Infrastructure\EloquentModels\PermissionEloquentModel;
use Src\Agenda\User\Infrastructure\EloquentModels\RoleEloquentModel;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;
use Tests\TestCase;

class UserEloquentModelTest extends TestCase
{
    /** @test */
    public function rolesRelationalOfUserModel()
    {
        $user = UserEloquentModel::factory()
            ->hasAttached(
                RoleEloquentModel::factory()->count(2),
                [],
                "roles"
            )
            ->create();

        $this->assertDatabaseCount('role_user', 2);
        $this->assertDatabaseHas('role_user', [
            'user_id' => $user->getId()
        ]);
    }

}
