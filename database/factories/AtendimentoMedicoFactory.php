<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Beneficiario;
use App\Models\Especialidade;
use App\Models\Medico;
use App\Models\LocalAtendimento;
use App\Models\Procedimento;
use Illuminate\Database\Eloquent\Factories\Factory;

class AtendimentoMedicoFactory extends Factory
{
    /**
     * Define name of the factory's corresponding model
     *
     * @return string
     */
    protected $model = \App\Models\AtendimentoMedico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomBeneficiario = Beneficiario::inRandomOrder()->first();
        $randomEspecialidade = Especialidade::inRandomOrder()->first();
        $randomMedico = Medico::inRandomOrder()->first();
        $randomLocalAtendimento = LocalAtendimento::inRandomOrder()->first();
        $randomProcedimento = Procedimento::inRandomOrder()->first();

        return [
            'beneficiario_id' => $randomBeneficiario->id,
            'especialidade_id' => $randomEspecialidade->id,
            'medico_id' => $randomMedico->id,
            'local_id' => $randomLocalAtendimento->id,
            'procedimento_id' => $randomProcedimento->id,
            'data' => today()->subDay(rand(1, 31))->subMonth(rand(1, 12))->subYear(rand(1, 5)),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
