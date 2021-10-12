<?php

namespace Database\Seeders;

use App\Models\Info;
use App\Models\Language;
use App\Models\Skill;
use App\Models\User;
use App\Models\WorkExperience;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(10)->create();
        Skill::factory(10)->create();
        Language::factory(10)->create();
        WorkExperience::factory(20)->create();
        Info::factory(10)->create();
        $languages = Language::all();
        User::all()->each(function ($user) use ($languages) {
            $user->languages()->attach(
                $languages->random()->id
            );
        });

        $skills = Skill::all();
        User::all()->each(function ($user) use ($skills) {
            $user->skills()->attach(
                $skills->random()->id
            );
        });
    }
}
