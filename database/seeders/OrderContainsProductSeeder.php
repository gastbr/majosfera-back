<?php

namespace Database\Seeders;

use App\Models\OrderContainsProduct;
use Illuminate\Database\Seeder;

class OrderContainsProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OrderContainsProduct::factory()->count(50)->create();
    }
}
