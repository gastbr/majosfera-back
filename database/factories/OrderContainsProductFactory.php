<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Order;
use App\Models\OrderContainsProduct;
use App\Models\Product;

class OrderContainsProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderContainsProduct::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'order_id' => Order::pluck('id')->random(),
            'product_id' => Product::pluck('id')->random(),
            'quantity' => fake()->numberBetween(1, 10)
        ];
    }
}
