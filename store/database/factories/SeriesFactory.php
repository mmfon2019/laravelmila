<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Genre;
use App\Models\Starring;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeriesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
           'slug'=>$this->faker->slug(),
           'title'=>$this->faker->title(),
           'description'=>$this->faker->paragraph(),
           'user_id'=>User::factory(),
           'genre_id'=>Genre::factory(),
           'starring_id'=>Starring::factory()
        ];
    }
}