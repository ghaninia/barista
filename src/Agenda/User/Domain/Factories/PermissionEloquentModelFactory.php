<?php

namespace Src\Agenda\User\Domain\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Agenda\User\Infrastructure\EloquentModels\PermissionEloquentModel;

class PermissionEloquentModelFactory extends Factory
{

    protected $model = PermissionEloquentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name()
        ];
    }
}
