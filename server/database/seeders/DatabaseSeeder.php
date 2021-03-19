<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\User;
use App\Models\Vacante;
use App\Models\Category;
use App\Models\Experience;
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
        // \App\Models\User::factory(10)->create();
        $users = User::factory(50)->create();
        $catories = Category::factory(50)->create();
        $cities = City::factory(50)->create();
        $experiences = Experience::factory(50)->create();

        $vacancies = Vacante::factory(50)
            ->make()
            ->each(function ($vacant) use ($users, $catories, $cities, $experiences) {
                // to each vacant without  be created i am building an associative array and i am saving it in the database.
                $vacant->user_id = $users->random()->id;
                $vacant->category_id = $catories->random()->id;
                $vacant->city_id = $cities->random()->id;
                $vacant->experience_id = $experiences->random()->id;
                $vacant->save();
            });
    }
}
