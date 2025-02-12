<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Comment;
use App\Models\User;
use App\Models\Product;

class CommentSeeder extends Seeder
{
    public function run()
    {
        $users = User::pluck('id')->toArray();
        $products = Product::pluck('id')->toArray();

        if (empty($users)) {
            User::factory(5)->create();
            $users = User::pluck('id')->toArray();
        }

        if (empty($products)) {
            Product::factory(10)->create();
            $products = Product::pluck('id')->toArray();
        }

        Comment::factory(15)->create([
            'user_id' => $users[array_rand($users)],
            'product_id' => $products[array_rand($products)],
        ]);
    }
}
