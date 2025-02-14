<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Association;

class AssociationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Association::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'tax_id' => fake()->word(),
            'business_name' => fake()->word(),
            'address' => fake()->word(),
            'email' => fake()->safeEmail(),
        ];
    }
}
