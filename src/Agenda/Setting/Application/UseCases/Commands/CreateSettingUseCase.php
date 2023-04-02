<?php

namespace Src\Agenda\Setting\Application\UseCases\Commands;

use Src\Agenda\Setting\Application\DTO\CreateSettingDTO;
use Src\Agenda\Setting\Application\Mappers\SettingMapper;
use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Domain\Repositories\SettingRepositoryInterface;
use Src\Agenda\User\Domain\Entities\User\User;
use Src\Shared\Domain\CommandInterface;

class CreateSettingUseCase implements CommandInterface
{
    private SettingRepositoryInterface $repository;

    public function __construct(
        private User $createBy,
        private EnumKeySetting $key,
        private mixed $value
    ) {
        $this->repository = app()->make(SettingRepositoryInterface::class);
    }

    public function execute()
    {
        return $this->repository->create(
            (new CreateSettingDTO)
                ->setKey($this->key)
                ->setValue($this->value)
                ->setCreateBy($this->createBy)
                ->setUpdateBy($this->createBy)
                ->setCreatedAt(new \DateTime())
                ->setUpdatedAt(new \DateTime())
        );
    }
}
