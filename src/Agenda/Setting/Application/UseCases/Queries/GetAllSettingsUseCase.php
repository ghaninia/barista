<?php

namespace Src\Agenda\Setting\Application\UseCases\Queries;

use Src\Agenda\Setting\Domain\Repositories\SettingRepositoryInterface;
use Src\Shared\Domain\QueryInterface;

class GetAllSettingsUseCase implements QueryInterface
{
    private SettingRepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = app(SettingRepositoryInterface::class);
    }

    public function handle(): mixed
    {
        return $this->repository->getAll();
    }
}
