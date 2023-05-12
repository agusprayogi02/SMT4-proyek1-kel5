<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // MenuItem::factory()->count(10)->create();
        MenuItem::insert(
            [
                [
                    'name' => 'Dashboard',
                    'route' => 'dashboard',
                    'permission_name' => 'dashboard',
                    'menu_group_id' => 1,
                ],
                [
                    'name' => 'Menu Users',
                    'route' => 'user-management/user',
                    'permission_name' => 'user.index',
                    'menu_group_id' => 2,
                ],
                [
                    'name' => 'Menu Siswa',
                    'route' => 'siswa',
                    'permission_name' => 'siswa.index',
                    'menu_group_id' => 2,
                ],
                [
                    'name' => 'Menu Guru',
                    'route' => 'guru',
                    'permission_name' => 'guru.index',
                    'menu_group_id' => 2,
                ],
                [
                    'name' => 'Role List',
                    'route' => 'role-and-permission/role',
                    'permission_name' => 'role.index',
                    'menu_group_id' => 3,
                ],
                [
                    'name' => 'Permission List',
                    'route' => 'role-and-permission/permission',
                    'permission_name' => 'permission.index',
                    'menu_group_id' => 3,
                ],
                [
                    'name' => 'Permission To Role',
                    'route' => 'role-and-permission/assign',
                    'permission_name' => 'assign.index',
                    'menu_group_id' => 3,
                ],
                [
                    'name' => 'User To Role',
                    'route' => 'role-and-permission/assign-user',
                    'permission_name' => 'assign.user.index',
                    'menu_group_id' => 3,
                ],
                [
                    'name' => 'Menu Kelas',
                    'route' => 'kelas',
                    'permission_name' => 'kelas.index',
                    'menu_group_id' => 4,
                ],
                [
                    'name' => 'Menu Keahlian',
                    'route' => 'keahlian',
                    'permission_name' => 'keahlian.index',
                    'menu_group_id' => 4,
                ],
                [
                    'name' => 'Menu Data SMK',
                    'route' => 'smk',
                    'permission_name' => 'smk.index',
                    'menu_group_id' => 4,
                ],
                [
                    'name' => 'Menu Magang',
                    'route' => 'magang',
                    'permission_name' => 'magang.index',
                    'menu_group_id' => 5,
                ],
                [
                    'name' => 'Menu Data DUDI',
                    'route' => 'dudi',
                    'permission_name' => 'dudi.index',
                    'menu_group_id' => 5,
                ],
                [
                    'name' => 'Menu Laporan Harian',
                    'route' => 'laporan-harian',
                    'permission_name' => 'laporan-harian.index',
                    'menu_group_id' => 6,
                ],
                [
                    'name' => 'Menu Group',
                    'route' => 'menu-management/menu-group',
                    'permission_name' => 'menu-group.index',
                    'menu_group_id' => 7,
                ],
                [
                    'name' => 'Menu Item',
                    'route' => 'menu-management/menu-item',
                    'permission_name' => 'menu-item.index',
                    'menu_group_id' => 7,
                ],
            ]
        );
    }
}
