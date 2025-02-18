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
            'name' => ucfirst(fake()->words(2, true)),
            'description' => fake()->text(),
            'price' => fake()->randomFloat(2, 1, 1000),
            'stock' => fake()->numberBetween(0, 1000),
            'category_id' => Category::pluck('id')->random(),
        ];
    }

    /**
     * Configure the factory.
     */
    public function configure()
    {
        return $this->afterCreating(function (Product $product) {
            $product->update([
                'image_url' => 'https://prd.place/400?id=' . $product->id,
            ]);
        });
    }
}
