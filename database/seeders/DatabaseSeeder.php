<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BeneficiarioSeeder::class,
            MedicoSeeder::class,
            EspecialidadeSeeder::class,
            ProcedimentoSeeder::class,
            LocalAtendimentoSeeder::class,
            AtendimentoMedicoSeeder::class,
        ]);
    }
}
