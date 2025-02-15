<?php

namespace Database\Seeders;

use App\Models\BelongsToAssociation;
use Illuminate\Database\Seeder;

class BelongsToAssociationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BelongsToAssociation::factory()->count(50)->create();
    }
}
