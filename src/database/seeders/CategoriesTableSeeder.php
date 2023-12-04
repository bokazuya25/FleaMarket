<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => '洋服',
            'created_at'=>now(),
            'updated_at'=>now(),
        ]);

        Category::create([
            'name' => 'メンズ',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Category::create([
            'name' => 'レディース',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
