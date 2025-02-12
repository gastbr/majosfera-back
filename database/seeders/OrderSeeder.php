<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Order;
use App\Models\User;

class OrderSeeder extends Seeder
{
    public function run()
    {
        $users = User::pluck('id')->toArray();

        if (empty($users)) {
            User::factory(5)->create();
            $users = User::pluck('id')->toArray();
        }

        Order::factory(10)->create([
            'user_id' => $users[array_rand($users)],
        ]);
    }
}
