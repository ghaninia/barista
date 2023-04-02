<?php

namespace Tests\Unit\src\Agenda\Setting\Application\UseCases;

use Src\Agenda\Setting\Application\UseCases\Commands\CreateSettingUseCase;
use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Domain\Entities\Setting;
use Src\Agenda\User\Application\Mappers\UserMapper;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;
use Tests\TestCase;

class CreateSettingTest extends TestCase
{
    /** @test */
    public function createSettingUseCase()
    {
        $user = UserEloquentModel::factory()->create();
        $user = UserMapper::fromEloquent($user);
        $key  = EnumKeySetting::AUTHENTICATION_TOKEN_EXPIRATION_TIME;
        $value = "hello world";
        $result = new CreateSettingUseCase($user, $key, $value);
        /** @var Setting $result */
        $result = $result->execute();

        $this->assertInstanceOf(Setting::class, $result);
        $this->assertDatabaseHas('settings', [
            'id' => $result->id,
            'key' => $result->key,
            'create_by' => $result->createBy->id,
            'update_by' => $result->updateBy->id,
            'value' => serialize($value)
        ]);
    }
}
