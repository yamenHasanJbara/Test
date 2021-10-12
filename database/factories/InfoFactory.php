<?php

namespace Database\Factories;

use App\Models\Info;
use Illuminate\Database\Eloquent\Factories\Factory;

class InfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Info::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'address' => $this->faker->text(200),
            'phone' => $this->faker->phoneNumber(),
            'birthday' => $this->faker->date('Y-m-d'),
            'gender' => $this->faker->numberBetween(0, 3),
            'nationality' => $this->faker->country(),
            'university' => $this->faker->text(200),
            'degree' => $this->faker->text(200),
            'summary' => $this->faker->text(200),
            'user_id' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
