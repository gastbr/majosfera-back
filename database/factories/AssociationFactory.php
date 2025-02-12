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
            'name' => $this->faker->company,
            'tax_id' => $this->faker->unique()->bothify('??######'),
            'business_name' => $this->faker->unique()->company,
            'address' => $this->faker->unique()->address, // Asegura valores únicos
            'email' => $this->faker->unique()->safeEmail,
            // 'created_at' => now(),
            // 'updated_at' => now(),
        ];
    }
}
