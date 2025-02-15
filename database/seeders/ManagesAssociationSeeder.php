<?php

namespace Database\Seeders;

use App\Models\ManagesAssociation;
use Illuminate\Database\Seeder;

class ManagesAssociationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ManagesAssociation::factory()->count(50)->create();
    }
}
