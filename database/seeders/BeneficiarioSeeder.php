<?php

namespace Database\Seeders;

use App\Models\Beneficiario;
use Illuminate\Database\Seeder;

class BeneficiarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Beneficiario::factory()->count(100)->create();
    }
}
