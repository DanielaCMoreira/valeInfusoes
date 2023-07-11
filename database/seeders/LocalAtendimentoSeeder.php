<?php

namespace Database\Seeders;

use App\Models\LocalAtendimento;
use Illuminate\Database\Seeder;

class LocalAtendimentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LocalAtendimento::factory()->count(100)->create();
    }
}
