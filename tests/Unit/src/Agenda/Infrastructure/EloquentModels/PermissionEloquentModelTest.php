<?php

namespace Tests\Unit\src\Agenda\Infrastructure\EloquentModels;

use Src\Agenda\User\Infrastructure\EloquentModels\PermissionEloquentModel;
use Src\Agenda\User\Infrastructure\EloquentModels\RoleEloquentModel;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;
use Tests\TestCase;

class PermissionEloquentModelTest extends TestCase
{
    /** @test */
    public function rolesRelationalOfUserModel()
    {
        $permission = PermissionEloquentModel::factory()
            ->hasAttached(
                RoleEloquentModel::factory()->count(2),
                [],
                "roles"
            )
            ->create();

        $this->assertDatabaseCount('permission_role', 2);
        $this->assertDatabaseHas('permission_role', [
            'permission_id' => $permission->getId()
        ]);
    }

}
