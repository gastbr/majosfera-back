<?php

namespace Database\Seeders;

use App\Models\UserLikesComment;
use Illuminate\Database\Seeder;

class UserLikesCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserLikesComment::factory()->count(50)->create();
    }
}
