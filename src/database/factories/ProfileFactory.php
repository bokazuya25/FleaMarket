<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $user_id = 1;

        $faker = $this->faker;

        return [
            'user_id' => $user_id++,
            'postcode' => $faker->postcode,
            'address' => $faker->prefecture . $faker->city . $faker->ward . $faker->streetAddress,
            'building' => $faker->optional($weight = 0.5)->secondaryAddress(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
