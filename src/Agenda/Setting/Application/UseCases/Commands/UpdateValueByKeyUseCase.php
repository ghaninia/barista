<?php

namespace Src\Agenda\Setting\Application\UseCases\Commands;

use Src\Agenda\Setting\Application\DTO\UpdateSettingDTO;
use Src\Agenda\Setting\Application\Mappers\SettingMapper;
use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Domain\Repositories\SettingRepositoryInterface;
use Src\Agenda\User\Domain\Entities\User\User;
use Src\Shared\Domain\CommandInterface;

class UpdateValueByKeyUseCase implements CommandInterface
{
    private SettingRepositoryInterface $repository;
    public function __construct(
        private User $updateBy,
        private EnumKeySetting $key,
        private mixed $value
    ) {
        $this->repository =  app()->make(SettingRepositoryInterface::class);
    }

    public function execute() {

        $setting = $this->repository->updateByKey(
            (new UpdateSettingDTO())
                ->setKey($this->key)
                ->setUpdateBy($this->updateBy)
                ->setValue($this->value)
        );

        return SettingMapper::fromEloquent($setting);
    }
}
