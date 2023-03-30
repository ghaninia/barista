<?php

namespace Tests\Unit\src\Agenda\User\Infrastructure\EloquentModels;

use Src\Agenda\User\Infrastructure\EloquentModels\PermissionEloquentModel;
use Src\Agenda\User\Infrastructure\EloquentModels\RoleEloquentModel;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;
use Tests\TestCase;

class RoleEloquentModelTest extends TestCase
{
    /** @test */
    public function permissionsRelationalOfRoleModel()
    {
        $role = RoleEloquentModel::factory()
            ->hasAttached(
                PermissionEloquentModel::factory()->count(2),
                [],
                "permissions"
            )
            ->create();

        $this->assertDatabaseCount('permission_role', 2);
        $this->assertDatabaseHas('permission_role', [
            'role_id' => $role->getId()
        ]);
    }

    /** @test */
    public function usersRelationalOfRoleModel()
    {
        $role = RoleEloquentModel::factory()
            ->hasAttached(
                UserEloquentModel::factory()->count(2),
                [],
                "users"
            )
            ->create();

        $this->assertDatabaseCount('role_user', 2);
        $this->assertDatabaseHas('role_user', [
            'role_id' => $role->getId()
        ]);
    }


}
