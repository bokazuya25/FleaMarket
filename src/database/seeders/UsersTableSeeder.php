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
        $masterPermission = Permission::create(['name'=>'master']);
        $editorPermission = Permission::create(['name'=>'editor']);

        Role::create(['name'=>'admin'])
            ->givePermissionTo($masterPermission);
        Role::create(['name'=>'writer'])
            ->givePermissionTo($editorPermission);

        User::create([
            'name' => '管理者',
            'email' => 'admin@admin.com',
            'email_verified_at' => now(),
            'password' =>bcrypt('password'),
            'img_url' => '/img/default_icon.svg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole('admin');

        User::create([
            'name' => '店舗代表者',
            'email' => 'shop@shop.com',
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'img_url' => '/img/default_icon.svg',
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ])->assignRole('writer');

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

        User::factory()->count(17)->create();
    }
}
