<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Medico;
use App\Models\Especialidade;
use Illuminate\Database\Eloquent\Factories\Factory;

class LocalAtendimentoFactory extends Factory
{
    /**
     * Define name of the factory's corresponding model
     *
     * @return string
     */
    protected $model = \App\Models\LocalAtendimento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $randomMedico = Medico::inRandomOrder()->first();
        $randomEspecialidade = Especialidade::inRandomOrder()->first();

        return [
            'endereco' => $this->faker->address,
            'medico_id' => $randomMedico->id,
            'especialidade_id' => $randomEspecialidade->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
