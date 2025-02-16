<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Comment;
use App\Models\User;
use App\Models\UserLikesComment;

class UserLikesCommentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserLikesComment::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::pluck('id')->random(),
            'comment_id' => Comment::pluck('id')->random(),
            'primary' => fake()->word(),
        ];
    }
}
