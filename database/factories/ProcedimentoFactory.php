<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProcedimentoFactory extends Factory
{
    /**
     * Define name of the factory's corresponding model
     *
     * @return string
     */
    protected $model = \App\Models\Procedimento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $tipoProcedimento = [ 
            0  => 'Cirurgia Geral', 
            1  => 'Ginecologia', 
            2  => 'Neurologia', 
            3  => 'Oftalmologia', 
            4  => 'Ortopedia', 
            5  => 'Otorrinolaringologia', 
            6  => 'Cirurgia Pediátrica',
            7  => 'Cirurgia Plástica e Reparadora',
            8  => 'Proctologia',
            9  => 'Urologia',
            10 => 'Vascular',
        ];

        return [
            'descricao_procedimento' => $this->faker->jobTitle,
            'tipo_procedimento' => $tipoProcedimento[rand(0,10)],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
