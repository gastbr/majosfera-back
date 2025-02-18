<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;

class CommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'product_id' => Product::pluck('id')->random(),
            'content' => fake()->paragraphs(3, true),
            'rating' => fake()->numberBetween(0, 10000),
            'date' => fake()->dateTime(),
        ];
    }
}
