<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Association;
use App\Models\MemberAssociation;
use App\Models\User;

class MemberAssociationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MemberAssociation::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'association_id' => Association::factory(),
            'status' => fake()->randomElement(["pending","accepted","rejected"]),
            'primary' => fake()->word(),
        ];
    }
}
