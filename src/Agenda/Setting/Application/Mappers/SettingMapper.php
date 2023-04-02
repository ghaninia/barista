<?php

namespace Src\Agenda\Setting\Application\Mappers;

use Src\Agenda\Setting\Infrastructure\EloquentModels\SettingEloquentModel;
use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Domain\Entities\Setting;
use Src\Agenda\User\Application\Mappers\UserMapper;
use Src\Agenda\User\Domain\Entities\User\User;

class SettingMapper
{
    public static function fromEloquent(SettingEloquentModel $model): Setting
    {
        return new Setting(
            $model->getId(),
            UserMapper::fromEloquent($model->getCreateBy()),
            UserMapper::fromEloquent($model->getUpdateBy()),
            EnumKeySetting::from($model->getKey()),
            $model->getValue(),
            $model->getUpdatedAt(),
            $model->getCreatedAt()
        );
    }
}
