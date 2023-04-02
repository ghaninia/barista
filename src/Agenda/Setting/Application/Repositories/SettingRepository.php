<?php

namespace Src\Agenda\Setting\Application\Repositories;

use Src\Agenda\Setting\Application\DTO\CreateSettingDTO;
use Src\Agenda\Setting\Application\DTO\FindSettingByKeyDTO;
use Src\Agenda\Setting\Application\DTO\UpdateSettingDTO;
use Src\Agenda\Setting\Application\Mappers\SettingMapper;
use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Domain\Entities\Setting;
use Src\Agenda\Setting\Domain\Repositories\SettingRepositoryInterface;
use Src\Agenda\Setting\Infrastructure\EloquentModels\SettingEloquentModel;

class SettingRepository implements SettingRepositoryInterface
{

    /**
     * @return Setting[]
     */
    public function getAll(): array
    {
        return SettingEloquentModel::query()
            ->with(['updateBy', 'createBy'])
            ->get()
            ->map(function ($setting) {
                return SettingMapper::fromEloquent($setting);
            })
            ->toArray();
    }

    public function updateByKey(UpdateSettingDTO $dto): bool
    {
        return SettingEloquentModel::query()
            ->where('key', $dto->getKey())
            ->update([
                'value' => serialize($dto->getValue()),
                'update_by' => $dto->getUpdateBy()->id,
                'updated_at' => new \DateTime()
            ]);
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

    public function findByKey(FindSettingByKeyDTO $dto): ?Setting
    {
        $setting = SettingEloquentModel::query()
            ->where('key', $dto->getKey())
            ->first();

        return !!$setting? SettingMapper::fromEloquent($setting): null;
    }
}
