<?php

namespace Tests\Unit\src\Agenda\Token\Application\DTO;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Src\Agenda\Token\Application\DTO\CreateTokenDTO;
use Src\Agenda\Token\Domain\Entities\Constants\EnumTypeToken;

class CreateTokenDtoTest extends TestCase
{
    use WithFaker;

    /** @test */
    public function createTokenDto()
    {
        $dto = (new CreateTokenDTO())
            ->setToken($token = $this->faker->numerify("######"))
            ->setType($type = EnumTypeToken::AUTH)
            ->setExpiredAt($expiredAt = new \DateTime())
            ->setUserId($userId = 1);

        $this->assertEquals($dto->getToken(), $token);
        $this->assertEquals($dto->getType(), $type->value);
        $this->assertEquals($dto->getExpiredAt(), $expiredAt);
        $this->assertEquals($dto->getUserId(), $userId);
    }
}
