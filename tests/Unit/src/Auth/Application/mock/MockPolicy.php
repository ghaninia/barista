<?php

namespace Tests\Unit\src\Auth\Application\mock;

use Src\Common\Domain\PolicyInterface;

class MockPolicy implements PolicyInterface
{

    public function mapper()
    {
        return [
            'firstTestCase'     => EnumPermissionMock::FIRST_TEST_CASE,
            'secondTestCase'    => EnumPermissionMock::SECOND_TEST_CASE,
            'thirdTestCase'     => EnumPermissionMock::THIRD_TEST_CASE,
        ];
    }

    public function firstTestCase(): bool
    {
        return true;
    }

    public function secondTestCase(): bool
    {
        return true;
    }

    public function thirdTestCase(): bool
    {
        return false;
    }
}
