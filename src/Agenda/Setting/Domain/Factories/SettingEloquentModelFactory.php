<?php

namespace Src\Agenda\Setting\Domain\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Agenda\Setting\Infrastructure\EloquentModels\SettingEloquentModel;

class SettingEloquentModelFactory extends Factory
{

    protected $model = SettingEloquentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'key' => fake()->unique(),
            'value' => fake()->text(),
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ];
    }
}
