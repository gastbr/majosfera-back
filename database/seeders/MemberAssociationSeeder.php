<?php

namespace Database\Seeders;

use App\Models\MemberAssociation;
use Illuminate\Database\Seeder;

class MemberAssociationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemberAssociation::factory()->count(50)->create();
    }
}
