<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateAdminUserSeeder extends Seeder
{
    /*** Run the database seeds.** @return void */
    public function run()
    {

        $user = User::create([
            'name' => 'Wesam Ashour',
            'email' => 'wesam@gmail.com',
            'password' => bcrypt('123456789'),
            'company_name' =>'Admin',
            'phone' =>'059999',
            'website' =>'https://www.maktaby.com',
            'city' => 'Gaza',
            'profile_photo_path' => '1648123849.png',
            'roles_name' => ["owner"],
            'Status' => 'مسؤول',
            'email_verified_at' => now(),

        ]);
        $role = Role::create(['name' => 'owner']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);
        $user->assignRole([$role->id]);
    }
}

//php artisan db:seed--class=CreateAdminUserSeeder
