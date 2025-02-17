<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            AssociationSeeder::class,
            AssociationPhoneSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            CommentSeeder::class,
            OrderSeeder::class,
            BelongsToAssociationSeeder::class,
            ContactFormSeeder::class,
            ManagesAssociationSeeder::class,
            MemberAssociationSeeder::class,
            OrderContainsProductSeeder::class,
            UserLikesProductSeeder::class,
            UserLikesCommentSeeder::class
        ]);
    }
}
