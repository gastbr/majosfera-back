<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Association;
use App\Models\ManagesAssociation;
use App\Models\User;

class ManagesAssociationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ManagesAssociation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'association_id' => Association::factory(),
            'primary' => fake()->word(),
        ];
    }
}
