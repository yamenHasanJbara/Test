<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\WorkExperience;
use Illuminate\Database\Eloquent\Factories\Factory;

class WorkExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WorkExperience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'position_name' => $this->faker->text(50),
            'description' => $this->faker->realText(200),
            'start_date' => $this->faker->date(),
            'end_date' => $this->faker->date(),
            'city' => $this->faker->city(),
            'country' => $this->faker->country(),
            'user_id' => User::all()->random()->id
        ];
    }
}
