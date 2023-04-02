<?php

namespace Src\Agenda\Setting\Domain\Repositories;

use Src\Agenda\Setting\Application\DTO\CreateSettingDTO;
use Src\Agenda\Setting\Application\DTO\FindSettingByKeyDTO;
use Src\Agenda\Setting\Application\DTO\UpdateSettingDTO;
use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Domain\Entities\Setting;

interface SettingRepositoryInterface
{
    public function getAll(): array;
    public function updateByKey(UpdateSettingDTO $dto): bool;
    public function create(CreateSettingDTO $dto): Setting;
    public function findByKey(FindSettingByKeyDTO $dto): ?Setting;
}
