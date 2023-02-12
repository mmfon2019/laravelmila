<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StarringFactory extends Factory
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
           'name'=>$this->faker->word(),
           'details'=>$this->faker->paragraph(),
        ];
    }
}