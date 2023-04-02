<?php

namespace Tests\Unit\src\Agenda\Setting\Application\Services;

use Src\Agenda\Setting\Application\Services\SettingSingleton;
use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Infrastructure\EloquentModels\SettingEloquentModel;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;
use Tests\TestCase;

class SettingSingletonTest extends TestCase
{
    /** @test */
    public function settingSingletonExecute()
    {
        $user = UserEloquentModel::factory()->create();
        $key = EnumKeySetting::AUTHENTICATION_TOKEN_EXPIRATION_TIME;

        SettingEloquentModel::factory()
            ->for($user, 'updateBy')
            ->for($user, 'createBy')
            ->state([
                'key' => $key->value,
                'value' => $value = 'test 1'
            ])
            ->create();

        $result = SettingSingleton::getInstance()->get($key);
        $this->assertSame($value, $result);
    }

    /** @test */
    public function settingFunctaionExecute()
    {
        $user = UserEloquentModel::factory()->create();
        $key = EnumKeySetting::AUTHENTICATION_TOKEN_EXPIRATION_TIME;

        SettingEloquentModel::factory()
            ->for($user, 'updateBy')
            ->for($user, 'createBy')
            ->state([
                'key' => $key->value,
                'value' => $value = 'test 1'
            ])
            ->create();

        $this->assertSame($value, setting($key));
    }
}
