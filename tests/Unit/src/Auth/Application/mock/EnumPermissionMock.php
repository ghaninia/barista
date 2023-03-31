<?php

namespace Tests\Unit\src\Auth\Application\mock;

use Src\Common\Domain\PermissionInterface;

enum EnumPermissionMock: string implements PermissionInterface
{
    case FIRST_TEST_CASE = "test.case";
    case SECOND_TEST_CASE = "second.test.case";
    case THIRD_TEST_CASE = "third.test.case";
}
