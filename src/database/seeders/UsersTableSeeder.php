<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $deleteUserPermission = Permission::create(['name' => 'delete-user']);
        $viewInteractionsPermission = Permission::create(['name' => 'view-interactions']);
        $sendEmailPermission = Permission::create(['name' => 'send-email']);
        $manageShopStaffPermission = Permission::create(['name' => 'manage-shop-staff']);

        Role::create(['name' => 'Admin'])
            ->givePermissionTo($deleteUserPermission, $viewInteractionsPermission, $sendEmailPermission);
        Role::create(['name' => 'ShopOwner'])
            ->givePermissionTo($manageShopStaffPermission);

        User::create([
            'name' => '管理者',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'img_url' => '/img/default_icon.svg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole('Admin');

        User::create([
            'name' => '店舗代表者',
            'email' => 'shop@shop.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'img_url' => '/img/default_icon.svg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole('shopOwner');

        User::create([
            'name' => '店舗スタッフ',
            'email' => 'staff@staff.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'img_url' => '/img/default_icon.svg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::create([
            'name' => 'ユーザー名',
            'email' => 'test@test.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'img_url' => '/img/default_icon.svg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory()->count(16)->create();
    }
}
