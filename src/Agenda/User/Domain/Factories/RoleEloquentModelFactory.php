<?php

namespace Src\Agenda\User\Domain\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Agenda\User\Infrastructure\EloquentModels\RoleEloquentModel;

class RoleEloquentModelFactory extends Factory
{

    protected $model = RoleEloquentModel::class;

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
