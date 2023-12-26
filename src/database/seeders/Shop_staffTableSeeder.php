<?php

namespace Database\Seeders;

use App\Models\Shop_staff;
use Illuminate\Database\Seeder;

class Shop_staffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop_staff::create([
            'user_id' => 2,
            'shop_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Shop_staff::create([
            'user_id' => 3,
            'shop_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
