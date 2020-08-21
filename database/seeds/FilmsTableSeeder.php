<?php

use Illuminate\Database\Seeder;
use App\Film;
use Faker\Generator as Faker;

class FilmsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10 ; $i++) {
            $new_film = new Film();
            $new_film->title = $faker->sentence(1);
            $new_film->overview = $faker->sentence(15);
            $new_film->rating = $faker->randomFloat(1, 1, 5);
            $new_film->save();
        }
    }
}
