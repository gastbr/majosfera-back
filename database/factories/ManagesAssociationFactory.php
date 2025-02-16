<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
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
            'user_id' => User::pluck('id')->random(),
            'association_id' => Association::pluck('id')->random(),
            'primary' => fake()->word(),
        ];
    }
}
