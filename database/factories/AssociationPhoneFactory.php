<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Association;
use App\Models\AssociationPhone;

class AssociationPhoneFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AssociationPhone::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'association_id' => Association::pluck('id')->random(),
            'phone' => fake()->phoneNumber(),
            'description' => fake()->text(),
        ];
    }
}
