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
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'img_url' => '',
            'postcode' => $this->faker->postcode,
            'address' => $this->faker->address,
            'building' => $this->faker->optional($weight = 0.5)->secondaryAddress(),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
