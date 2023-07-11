<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class MedicoFactory extends Factory
{
    /**
     * Define name of the factory's corresponding model
     *
     * @return string
     */
    protected $model = \App\Models\Medico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'crm' => 'CRM/SP' . rand(100000,999999),
            'data_nascimento' => today()->subYear(rand(23, 80)),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
