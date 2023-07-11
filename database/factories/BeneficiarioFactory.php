<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class BeneficiarioFactory extends Factory
{
    /**
     * Define name of the factory's corresponding model
     *
     * @return string
     */
    protected $model = \App\Models\Beneficiario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        $sexo = [ 0 => 'f', 1 => 'm'];

        return [
            'nome' => $this->faker->name,
            'data_nascimento' => today()->subYear(rand(1, 80)),
            'sexo' => $sexo[rand(0,1)],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
