<?php

namespace Src\Agenda\Setting\Domain\Services;

use Src\Agenda\User\Domain\Entities\User\User;

interface SettingServiceInterface
{
    public function updateByKeys(User $user, $keyValues): int;
}
