<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Association;
use App\Models\Category;
use App\Models\Product;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'association_id' => Association::pluck('id')->random(),
            'name' => fake()->name(),
            'description' => fake()->text(),
            'price' => fake()->word(),
            'stock' => fake()->numberBetween(-10000, 10000),
            'image' => fake()->word(),
            'category_id' => Category::pluck('id')->random(),
        ];
    }
}
