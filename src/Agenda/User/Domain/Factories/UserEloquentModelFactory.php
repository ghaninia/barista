<?php

namespace Src\Agenda\User\Domain\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Src\Agenda\User\Domain\Entities\User\Constants\EnumUserGender;
use Src\Agenda\User\Infrastructure\EloquentModels\UserEloquentModel;

class UserEloquentModelFactory extends Factory
{

    protected $model = UserEloquentModel::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'gender' => EnumUserGender::MALE->value,
            'mobile' => fake()->numerify("09#########"),
            'is_active' => fake()->boolean(),
            'password' => bcrypt('secret'),
            'remember_token' => Str::random(10),
        ];
    }
}
