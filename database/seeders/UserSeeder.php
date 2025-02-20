<?php

namespace Database\Seeders;

use App\Models\ManagesAssociation;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'admin@test.com',
            'password' => bcrypt('123'),
            'admin' => true
        ]);

        User::factory()->create([
            'name' => 'Test Gestor',
            'email' => 'gestor@test.com',
            'password' => bcrypt('123'),
            'admin' => false
        ]);

        ManagesAssociation::factory()->create([
            'user_id' => 2,
            'association_id' => 1
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'user@test.com',
            'password' => bcrypt('123'),
            'admin' => false
        ]);

        User::factory(10)->create();
    }
}
