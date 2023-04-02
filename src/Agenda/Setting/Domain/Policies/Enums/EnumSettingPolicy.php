<?php

namespace Src\Agenda\Setting\Domain\Policies\Enums;

use Src\Shared\Domain\PermissionInterface;

enum EnumSettingPolicy: string implements PermissionInterface
{
    case SETTING_INDEX = 'setting.index';
    case SETTING_STORE = 'setting.store';
    case SETTING_SHOW = 'setting.show';
    case SETTING_DESTROY = 'setting.destroy';
    case SETTING_UPDATE = 'setting.update';
}
