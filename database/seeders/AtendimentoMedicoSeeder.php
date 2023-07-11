<?php

namespace Database\Seeders;

use App\Models\AtendimentoMedico;
use Illuminate\Database\Seeder;

class AtendimentoMedicoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AtendimentoMedico::factory()->count(100)->create();
    }
}
