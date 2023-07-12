<?php

namespace Database\Seeders;

use Faker\Generator;
use Carbon\Carbon;
use App\Models\LocalAtendimento;
use App\Models\Medico;
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
        $faker = app(Generator::class);

        for ($i=0; $i < 100; $i++) { 
            $localAtendimento = LocalAtendimento::select('medico_id','especialidade_id')->orderBy('id', 'desc')->first();
    
            $proximoMedico = (isset($localAtendimento->medico_id)) ? $localAtendimento->medico_id + 1 : 1;
            $proximaEspecialidade = (isset($localAtendimento->especialidade_id)) ? $localAtendimento->especialidade_id + 1 : 1;
            
            $medico = Medico::where('id', $proximoMedico)->first();
            $especialidade = Medico::where('id', $proximaEspecialidade)->first();

            if(isset($medico) && isset($especialidade)) {
                LocalAtendimento::create([
                    'endereco' => $faker->address,
                    'medico_id' => $proximoMedico,
                    'especialidade_id' => $proximaEspecialidade,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ]);
            }
            else {
                break;
            }
        }
    }
}
