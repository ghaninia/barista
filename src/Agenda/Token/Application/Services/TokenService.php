<?php

namespace Src\Agenda\Token\Application\Services;

use Src\Agenda\Token\Application\UseCases\Commands\CreateTokenUseCase;
use Src\Agenda\Token\Domain\Entities\Constants\EnumTypeToken;
use Src\Agenda\Token\Domain\Services\TokenServiceInterface;
use Src\Agenda\User\Domain\Entities\User\User;

class TokenService implements TokenServiceInterface
{
    /**
     * @return string
     */
    private function getToken(): string
    {
        return uniqid();
    }

    /**
     * @return \DateTime
     */
    private function getExpiredAt(): \DateTime
    {
        return new \DateTime('+2 minutes');
    }

    public function createAuthTokenWithSendSms(User $user)
    {

        $token = new CreateTokenUseCase(
            $user,
            $this->makeToken(),
            EnumTypeToken::AUTH,
            $this->getExpiredAt()
        );

    }

}
