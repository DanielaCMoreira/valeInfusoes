<?php

namespace Database\Seeders;

use App\Models\Especialidade;
use Illuminate\Database\Seeder;

class EspecialidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Especialidade::factory()->count(100)->create();
    }
}
