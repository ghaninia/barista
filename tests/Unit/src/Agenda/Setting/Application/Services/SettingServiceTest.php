<?php

namespace Tests\Unit\src\Agenda\Setting\Application\Services;

use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Domain\Services\SettingServiceInterface;
use Src\Agenda\Setting\Infrastructure\EloquentModels\SettingEloquentModel;
use Src\Agenda\User\Application\Mappers\UserMapper;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;
use Tests\TestCase;

class SettingServiceTest extends TestCase
{
    /** @test */
    public function updateByKeys()
    {
        $user = UserEloquentModel::factory()->create();
        $key = EnumKeySetting::AUTHENTICATION_TOKEN_EXPIRATION_TIME;

        SettingEloquentModel::factory()
            ->for($user, 'updateBy')
            ->for($user, 'createBy')
            ->state([
                'key' => $key->value
            ])
            ->create();

        $user = UserMapper::fromEloquent($user);

        /** @var SettingServiceInterface $settingService */
        $settingService = app(SettingServiceInterface::class);
        $updateSetting  = $settingService->updateByKeys($user, [
            $key->value => "hello world"
        ]);

        $this->assertEquals(1, $updateSetting);
    }

    /**
     * @expectedException Exception
     * @test
     */
    public function updateByKeysHasException()
    {
        $user = UserEloquentModel::factory()->create();
        $key = EnumKeySetting::AUTHENTICATION_TOKEN_EXPIRATION_TIME;

        SettingEloquentModel::factory()
            ->for($user, 'updateBy')
            ->for($user, 'createBy')
            ->state([
                'key' => $key->value
            ])
            ->create();

        $user = UserMapper::fromEloquent($user);

        /** @var SettingServiceInterface $settingService */
        $settingService = app(SettingServiceInterface::class);
        $updateSetting  = $settingService->updateByKeys($user, [
            "x" => "hello world"
        ]);

        $this->assertEquals(0, $updateSetting);
    }
}
