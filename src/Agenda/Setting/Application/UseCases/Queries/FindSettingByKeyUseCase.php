<?php

namespace Src\Agenda\Setting\Application\UseCases\Queries;

use Src\Agenda\Setting\Application\DTO\FindSettingByKeyDTO;
use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Domain\Repositories\SettingRepositoryInterface;
use Src\Shared\Domain\QueryInterface;

class FindSettingByKeyUseCase implements QueryInterface
{
    private SettingRepositoryInterface $repository;

    public function __construct(
        private EnumKeySetting $key
    ) {
        $this->repository = app(SettingRepositoryInterface::class);
    }

    public function handle(): mixed
    {
        return $this->repository->findByKey(
            (new FindSettingByKeyDTO)
                ->setKey($this->key)
        );
    }
}
