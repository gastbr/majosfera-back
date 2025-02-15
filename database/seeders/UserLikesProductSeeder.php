<?php

namespace Database\Seeders;

use App\Models\UserLikesProduct;
use Illuminate\Database\Seeder;

class UserLikesProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserLikesProduct::factory()->count(50)->create();
    }
}
