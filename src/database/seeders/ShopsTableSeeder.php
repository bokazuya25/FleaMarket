<?php

namespace Database\Seeders;

use App\Models\Shop;
use Illuminate\Database\Seeder;

class ShopsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop::create([
            'name' => 'テストショップ',
            'img_url' => '/img/shop_icon.svg',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
