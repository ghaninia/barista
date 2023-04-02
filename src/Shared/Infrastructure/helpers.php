<?php

use Src\Auth\Application\Authorization;
use Src\Shared\Domain\PermissionInterface;
use Src\Agenda\Setting\Application\Services\SettingSingleton;
use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;

if (! function_exists('authorize')) {
    function authorize(PermissionInterface|array $abilities,string $policy,bool $exact = false): bool {
        Authorization::getInstance()
            ->setExact($exact)
            ->setAbilities($abilities)
            ->setPolicy($policy)
            ->execute();
    }
}

if (! function_exists('setting')) {
    function setting(EnumKeySetting $key, $default = null): mixed {
        return SettingSingleton::getInstance()->get($key, $default);
    }
}
