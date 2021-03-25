<?php

namespace Database\Factories;

use App\Models\Vacante;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

class VacanteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vacante::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name,
            "description" => $this->faker->text,
            "salary" => $this->faker->randomFloat($maxDecimals = 2, $min = 750000, $max = 8000000),
            "benetifs" => $this->faker->text,

            "vacancies" => $this->faker->randomElement(["1 semana", "2 semanas", "3 semanas", "1 mes", "2 meses", "3 meses", "4 meses", "5 meses", "6 meses", "7 o más meses"]),

            "requirements" => $this->faker->text,
            "functionalities" => $this->faker->text,
            "date" => Carbon::now()->format('Y-m-d H:i:s'),
            "status" => $this->faker->randomElement(["active", "inactive"]),

        ];
    }
}
