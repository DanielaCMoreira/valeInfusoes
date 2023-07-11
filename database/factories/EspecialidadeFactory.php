<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class EspecialidadeFactory extends Factory
{
    /**
     * Define name of the factory's corresponding model
     *
     * @return string
     */
    protected $model = \App\Models\Especialidade::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'especialidade' => $this->faker->jobTitle,
            'cbos' => rand(1000,9999) . '-' . rand(10,99),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
