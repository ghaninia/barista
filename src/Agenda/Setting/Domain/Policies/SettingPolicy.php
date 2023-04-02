<?php

namespace Src\Agenda\Setting\Domain\Policies;

use Src\Agenda\Setting\Domain\Policies\Enums\EnumSettingPolicy;
use Src\Shared\Domain\PolicyInterface;

class SettingPolicy implements PolicyInterface
{
    public function mapper(): array
    {
        return [
            'getAllSettings'      => EnumSettingPolicy::SETTING_INDEX,
            'createNewSetting'    => EnumSettingPolicy::SETTING_STORE,
            'showSetting'         => EnumSettingPolicy::SETTING_SHOW,
            'updateSetting'       => EnumSettingPolicy::SETTING_UPDATE,
            'deleteSetting'       => EnumSettingPolicy::SETTING_DESTROY
        ];
    }

    public function getAllSettings()
    {

    }

    public function createNewSetting()
    {

    }

    public function showSetting()
    {

    }

    public function updateSetting()
    {

    }

    public function deleteSetting()
    {

    }
}
