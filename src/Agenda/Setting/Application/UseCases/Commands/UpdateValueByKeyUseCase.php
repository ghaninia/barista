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
        private readonly User           $updateBy,
        private readonly EnumKeySetting $key,
        private readonly mixed          $value
    ) {
        $this->repository =  app(SettingRepositoryInterface::class);
    }

    public function execute()
    {
        return $this->repository->updateByKey(
            (new UpdateSettingDTO())
                ->setKey($this->key)
                ->setUpdateBy($this->updateBy)
                ->setValue($this->value)
        );
    }
}
