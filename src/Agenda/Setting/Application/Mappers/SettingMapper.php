<?php

namespace Src\Agenda\Setting\Application\Mappers;

use Src\Agenda\Setting\Domain\Entities\Setting;
use Src\Agenda\Setting\Infrastructure\EloquentModels\SettingEloquentModel;

class SettingMapper
{
    public static function fromEloquent(SettingEloquentModel $model): Setting
    {
        return new Setting(
            $model->getId(),
            $model->getCreateById(),
            $model->getUpdateById(),
            $model->getKey(),
            $model->getValue(),
            $model->getUpdatedAt(),
            $model->getCreatedAt()
        );
    }
}
