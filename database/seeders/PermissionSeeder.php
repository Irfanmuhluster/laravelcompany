<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $this->generateFor('user', 'web', 'pengguna');
        $this->generateFor('role', 'web',  'peran');

        Permission::create(['name' => 'edit_permission', 'guard_name'=> 'web', 'menu_name' => 'hak akses']);
        Permission::create(['name' => 'read_permission', 'guard_name'=> 'web', 'menu_name' => 'hak akses']);
        Permission::create(['name' => 'create_menu_admin', 'guard_name'=> 'web', 'menu_name' => 'hak akses']);
        Permission::create(['name' => 'edit_menu_admin', 'guard_name'=> 'web', 'menu_name' => 'hak akses']);
        Permission::create(['name' => 'delete_menu_admin', 'guard_name'=> 'web', 'menu_name' => 'hak akses']);

        Permission::create(['name' => 'kelola_menu', 'guard_name'=> 'web', 'menu_name' => 'menu publik']);

        Permission::create(['name' => 'ubah password', 'guard_name'=> 'web', 'menu_name' => 'pengguna']);
    }

    public function generateFor($table,$guard,  $table_name)
    {
        Permission::create(['name' => 'read_'.$table, 'guard_name'=> $guard, 'menu_name' => $table_name]);
        Permission::create(['name' => 'create_'.$table, 'guard_name'=> $guard, 'menu_name' => $table_name]);
        Permission::create(['name' => 'edit_'.$table, 'guard_name'=> $guard, 'menu_name' => $table_name]);
        Permission::create(['name' => 'delete_'.$table, 'guard_name'=> $guard, 'menu_name' => $table_name]);
    }
}
