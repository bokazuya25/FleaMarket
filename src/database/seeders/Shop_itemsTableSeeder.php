<?php

namespace Database\Seeders;

use App\Models\Shop_item;
use Illuminate\Database\Seeder;

class Shop_itemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shop_item::factory()->count(50)->create();
    }
}
