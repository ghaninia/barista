<?php

namespace Src\Agenda\Setting\Application\Services;

use Src\Agenda\Setting\Application\UseCases\Commands\UpdateValueByKeyUseCase;
use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Domain\Services\SettingServiceInterface;
use Src\Agenda\User\Domain\Entities\User\User;

class SettingService implements SettingServiceInterface
{

    /**
     * @param User $user
     * @param array<string, mixed> $keyValues
     * @return bool
     */
    public function updateByKeys(User $user, $keyValues): int
    {
        foreach ($keyValues as $settingKey => $settingValue) {
            try {
                $key = EnumKeySetting::from($settingKey);
                $result[] = new UpdateValueByKeyUseCase($user, $key, $settingValue);
            } catch (\Throwable $exception) {
            }
        }

        return isset($result)? count($result): 0;
    }
}
