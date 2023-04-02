<?php

namespace Tests\Unit\src\Agenda\Setting\Application\UseCases;

use Src\Agenda\Setting\Application\UseCases\Queries\GetAllSettingsUseCase;
use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Domain\Entities\Setting;
use Src\Agenda\Setting\Infrastructure\EloquentModels\SettingEloquentModel;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;
use Tests\TestCase;

class GetAllSettingsTest extends TestCase
{
    /** @test */
    public function getAllSettingsUseCase()
    {
        $key  = EnumKeySetting::AUTHENTICATION_TOKEN_EXPIRATION_TIME;
        $createBy = UserEloquentModel::factory()->create();
        $setting = SettingEloquentModel::factory()
            ->for($createBy, 'updateBy')
            ->for($createBy, 'createBy')
            ->state([
                'key' => $key->value,
                'value' => $beforeValue = 'test'
            ])
            ->create();

        $result = new GetAllSettingsUseCase();
        $result = $result->handle();

        $this->assertEquals(1, count($result));
        $this->assertInstanceOf(Setting::class, $result[0]);
    }
}
