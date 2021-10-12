<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Skill;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class SkillUserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'skill_id' => Skill::all()->random()->id
        ];
    }
}
