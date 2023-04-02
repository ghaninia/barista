<?php

namespace Tests\Unit\src\Agenda\Setting\Application\UseCases;

use Src\Agenda\Setting\Application\UseCases\Queries\FindSettingByKeyUseCase;
use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Domain\Entities\Setting;
use Src\Agenda\Setting\Infrastructure\EloquentModels\SettingEloquentModel;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;
use Tests\TestCase;

class FindSettingByKeyTest extends TestCase
{
    /** @test */
    public function findSettingByKeyUseCase()
    {
        $key = EnumKeySetting::AUTHENTICATION_TOKEN_EXPIRATION_TIME;
        $createBy = UserEloquentModel::factory()->create();
        $setting = SettingEloquentModel::factory()
            ->for($createBy, 'updateBy')
            ->for($createBy, 'createBy')
            ->state([
                'key' => $key->value,
                'value' => $beforeValue = 'test'
            ])
            ->create();

        /** @var Setting $result */
        $result = new FindSettingByKeyUseCase($key);
        $result = $result->handle();
        $this->assertInstanceOf(Setting::class, $result);
        $this->assertSame($result->id, $setting->id);
        $this->assertSame($result->key, $key);
    }
}
