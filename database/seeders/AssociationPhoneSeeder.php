<?php

namespace Database\Seeders;

use App\Models\AssociationPhone;
use Illuminate\Database\Seeder;

class AssociationPhoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AssociationPhone::factory()->count(50)->create();
    }
}
