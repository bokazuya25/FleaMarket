<?php

namespace Database\Factories;

use App\Models\Condition;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;

class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = $this->faker;
        $image_files = File::files(public_path('/img/dummy'));
        $random_image = '/img/dummy/' . $image_files[array_rand($image_files)]->getFilename();

        return [
            'name' => $faker->word(),
            'price' => $faker->numberBetween(1000, 30000),
            'description' => $faker->realText(50),
            'img_url' => $random_image,
            'user_id' => User::inRandomOrder()->first()->id,
            'condition_id' => Condition::inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
