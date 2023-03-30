<?php

namespace Src\Agenda\Token\Domain\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Src\Agenda\Token\Domain\Entities\Constants\EnumTypeToken;
use Src\Agenda\Token\Infrastructure\EloquentModels\TokenEloquentModel;

class TokenEloquentModelFactory extends Factory
{

    protected $model = TokenEloquentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'token' => fake()->numerify("######"),
            'expired_at' => fake()->dateTime("+1 day"),
            'type' => EnumTypeToken::AUTH->value
        ];
    }
}
