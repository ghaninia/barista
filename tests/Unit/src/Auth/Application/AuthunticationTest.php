<?php

namespace Tests\Unit\src\Auth\Application;

use Tests\TestCase;
use Src\Auth\Application\Authorization;
use Src\Shared\Domain\Exceptions\UnauthorizedUserException;
use Tests\Unit\src\Auth\Application\mock\EnumPermissionMock;
use Tests\Unit\src\Auth\Application\mock\MockPolicy;

class AuthunticationTest extends TestCase
{

    /** @test */
    public function allowsOnePermissions()
    {
        $result = Authorization::getInstance()
            ->setPolicy(MockPolicy::class)
            ->setExact(false)
            ->setAbilities(
                EnumPermissionMock::FIRST_TEST_CASE
            )
            ->execute();

        $this->assertTrue($result);
    }

    /** @test */
    public function allowsTwoPermissions()
    {
        $result = Authorization::getInstance()
            ->setPolicy(MockPolicy::class)
            ->setExact(false)
            ->setAbilities([
                EnumPermissionMock::FIRST_TEST_CASE,
                EnumPermissionMock::SECOND_TEST_CASE
            ])
            ->execute();

        $this->assertTrue($result);
    }

    /** @test */
    public function allowsThreePermissionsWithoutExact()
    {
        $result = Authorization::getInstance()
            ->setPolicy(MockPolicy::class)
            ->setExact(false)
            ->setAbilities([
                EnumPermissionMock::FIRST_TEST_CASE,
                EnumPermissionMock::SECOND_TEST_CASE,
                EnumPermissionMock::THIRD_TEST_CASE
            ])
            ->execute();

        $this->assertTrue($result);
    }

    /**
     * @test
     */
    public function denyThreePermissionsWithExact()
    {
        $this->expectException(UnauthorizedUserException::class);

        Authorization::getInstance()
            ->setPolicy(MockPolicy::class)
            ->setExact(true)
            ->setAbilities([
                EnumPermissionMock::FIRST_TEST_CASE,
                EnumPermissionMock::SECOND_TEST_CASE,
                EnumPermissionMock::THIRD_TEST_CASE
            ])
            ->execute();
    }
}
