<?php

namespace Database\Seeders;

use App\Models\Procedimento;
use Illuminate\Database\Seeder;

class ProcedimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Procedimento::factory()->count(100)->create();
    }
}
