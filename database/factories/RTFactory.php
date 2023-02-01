<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RTFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // for ($i=0; $i < 10 ; $i++) { 
        //     yield $i;
        // }
        return [
            'nama_rt' => $this->faker->unique()->numberBetween(1, 10),
        ];
    }
}
