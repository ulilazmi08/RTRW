<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;


class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $array = [1, 2, 3, 4, 5,6,7,8,9];
        // $random = Arr::random($array);
        // $random = Str::random(16);
        return [
            'name' => $this->faker->name(),
            'role' => '1',
            'role_keluarga' => '1',
            'no_ktp' => $this->faker->numerify('################'),
            'email' => $this->faker->unique()->freeEmail(),
            // 'email_verified_at' => now(),
            'password' => Hash::make('123456'), // password
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
