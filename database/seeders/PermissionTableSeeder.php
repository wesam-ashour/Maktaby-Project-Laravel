<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /*** Run the database seeds.** @return void */
    public function run()
    {
        $permissions = [

            'لوحة تحكم المسؤول',
            'لوحة تحكم المستخدم',
            'الاقسام',
            'الشركات',
            'الاماكن للمستخدم',
            'الخدمات للمستخدم',
            'الملاحظات',
            'ادارة المستخدمين',
            'مستخدم جديد',
            'مستخدم غير فعال',

            ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
