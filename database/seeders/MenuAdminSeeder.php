<?php

namespace Database\Seeders;

use App\Models\MenuAdmin;
use Illuminate\Database\Seeder;

class MenuAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $items =
            [
                [
                    'title' => 'Pengaturan Akses',
                    'role_id' => '1',
                    'url'  => null,
                    'icon_class' => 'fas fa-wrench',
                    'parent_id' => null,
                    'order' => '1',
                ],
                [
                    'title' => 'Pengguna',
                    'role_id' => '1',
                    'url'  => 'admin.settingaccess.user.index',
                    'icon_class' => 'far fa-circle',
                    'parent_id' => '1',
                    'order' => '1',
                ],
                [
                    'title' => 'Peran',
                    'role_id' => '1',
                    'url'  => 'admin.settingaccess.role.index',
                    'icon_class' => 'far fa-circle',
                    'parent_id' => '1',
                    'order' => '2',
                ],
                [
                    'title' => 'Hak Akses',
                    'role_id' => '1',
                    'url'  => 'admin.setting.permission',
                    'icon_class' => 'far fa-circle',
                    'parent_id' => '1',
                    'order' => '3',
                ],
                [
                    'title' => 'Pengaturan Website',
                    'role_id' => '1',
                    'url'  => null,
                    'icon_class' => 'fas fa-wrench',
                    'parent_id' => null,
                    'order' => '2',
                ],
                [
                    'title' => 'Umum',
                    'role_id' => '1',
                    'url'  => 'admin.setting.common_setting',
                    'icon_class' => 'far fa-circle',
                    'parent_id' => '5',
                    'order' => '1',
                ],
                [
                    'title' => 'Menu Publik',
                    'role_id' => '1',
                    'url'  => 'admin.setting.menupublic.index',
                    'icon_class' => 'far fa-circle',
                    'parent_id' => '5',
                    'order' => '1',
                ],
                [
                    'title' => 'Sosial Media',
                    'role_id' => '1',
                    'url'  => 'admin.setting.social_media_setting',
                    'icon_class' => 'far fa-circle',
                    'parent_id' => '5',
                    'order' => '1',
                ],
                [
                    'title' => 'Pesan Selamat Datang',
                    'role_id' => '1',
                    'url'  => 'admin.setting.welcome_setting',
                    'icon_class' => 'far fa-circle',
                    'parent_id' => '5',
                    'order' => '1',
                ],
                [
                    'title' => 'Pengaturan Email',
                    'role_id' => '1',
                    'url'  => 'admin.setting.email_setting',
                    'icon_class' => 'far fa-circle',
                    'parent_id' => '5',
                    'order' => '1',
                ],
                [
                    'title' => 'Template Email',
                    'role_id' => '1',
                    'url'  => 'admin.setting.email_template',
                    'icon_class' => 'far fa-circle',
                    'parent_id' => '5',
                    'order' => '1',
                ]
            ];

        \DB::table('menu_admins')->insert($items);
    }
}
