<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Association;
use App\Models\BelongsToAssociation;
use App\Models\User;

class BelongsToAssociationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BelongsToAssociation::class;

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
