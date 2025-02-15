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
        UserSeeder::class;
        AssociationSeeder::class;
        CategorySeeder::class;
        CommentSeeder::class;
        OrderSeeder::class;
        ProductSeeder::class;
    }
}
