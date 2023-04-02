<?php

namespace Tests\Unit\src\Agenda\Setting\Application\UseCases;

use Src\Agenda\Setting\Application\Mappers\SettingMapper;
use Src\Agenda\Setting\Application\UseCases\Commands\UpdateValueByKeyUseCase;
use Src\Agenda\Setting\Domain\Entities\Constants\EnumKeySetting;
use Src\Agenda\Setting\Infrastructure\EloquentModels\SettingEloquentModel;
use Src\Agenda\User\Application\Mappers\UserMapper;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;
use Tests\TestCase;

class UpdateValueByKeyTest extends TestCase
{
    /** @test */
    public function updateValueByKey()
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

        $setting = SettingMapper::fromEloquent($setting);
        $updateBy = UserEloquentModel::factory()->create();
        $updateBy = UserMapper::fromEloquent($updateBy);

        $afterValue = 'test two';
        $result = new UpdateValueByKeyUseCase($updateBy, $key, $afterValue);
        $result = $result->execute();
        $this->assertTrue($result);

        $this->assertDatabaseHas('settings', [
            'key' => $key->value,
            'value' => serialize($afterValue)
        ]);
    }
}
