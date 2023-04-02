<?php

namespace Src\Agenda\Setting\Application\Repositories;

use Src\Agenda\Setting\Application\DTO\CreateSettingDTO;
use Src\Agenda\Setting\Application\DTO\UpdateSettingDTO;
use Src\Agenda\Setting\Application\Mappers\SettingMapper;
use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Domain\Entities\Setting;
use Src\Agenda\Setting\Infrastructure\EloquentModels\SettingEloquentModel;

class SettingRepository implements \Src\Agenda\Setting\Domain\Repositories\SettingRepositoryInterface
{
    public function updateByKey(UpdateSettingDTO $dto): Setting
    {
        $setting = SettingEloquentModel::query()
            ->whereKey($dto->getKey()->value)
            ->update([
                'value' => $dto->getValue(),
                'update_by' => $dto->getUpdateBy()->id,
                'updated_at' => new \DateTime()
            ]);

        return SettingMapper::fromEloquent($setting);
    }

    public function create(CreateSettingDTO $dto): Setting
    {
        $setting = SettingEloquentModel::create([
            'key' => $dto->getKey(),
            'value' => $dto->getValue(),
            'create_by' => $dto->getCreateBy()->id,
            'update_by' => $dto->getUpdateBy()->id,
            'created_at' => $dto->getCreatedAt(),
            'updated_at' => $dto->getUpdatedAt(),
        ]);

        return SettingMapper::fromEloquent($setting);
    }

    public function existsKey(EnumKeySetting $key): bool
    {
        return SettingEloquentModel::query()
            ->whereType($key->value)
            ->exists();
    }
}
