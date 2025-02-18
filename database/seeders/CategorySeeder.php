<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Electrodomésticos',
            'Muebles',
            'Ropa',
            'Juguetes',
            'Alimentos',
            'Bebidas',
            'Cosmética',
            'Tecnología',
            'Papelería',
            'Deportes',
            'Educativo',
            'Reciclado',
            'Segunda mano',
            'Salud',
            'Animales',
            'Hecho a mano',
            'Cultura',
            'Libros',
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(['name' => $category]);
        }
    }
}
