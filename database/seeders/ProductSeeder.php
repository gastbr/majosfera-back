<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Association;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $associations = Association::pluck('id')->toArray();
        $categories = Category::pluck('id')->toArray();

        if (empty($associations) || empty($categories)) {
            Association::factory(5)->create();
            Category::factory(5)->create();
            $associations = Association::pluck('id')->toArray();
            $categories = Category::pluck('id')->toArray();
        }

        Product::factory(20)->create([
            'association_id' => $associations[array_rand($associations)],
            'category_id' => $categories[array_rand($categories)],
        ]);
    }
}
