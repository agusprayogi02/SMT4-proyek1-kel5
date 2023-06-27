<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'dashboard']);
        Permission::create(['name' => 'user.management']);
        Permission::create(['name' => 'role.permission.management']);
        Permission::create(['name' => 'magang.management']);
        Permission::create(['name' => 'edukasi.management']);
        Permission::create(['name' => 'menu.management']);
        Permission::create(['name' => 'laporan.harian.management']);

        //user
        Permission::create(['name' => 'user.index']);
        Permission::create(['name' => 'user.create']);
        Permission::create(['name' => 'user.edit']);
        Permission::create(['name' => 'user.destroy']);
        Permission::create(['name' => 'user.import']);
        Permission::create(['name' => 'user.export']);

        //role
        Permission::create(['name' => 'role.index']);
        Permission::create(['name' => 'role.create']);
        Permission::create(['name' => 'role.edit']);
        Permission::create(['name' => 'role.destroy']);
        Permission::create(['name' => 'role.import']);
        Permission::create(['name' => 'role.export']);

        //permission
        Permission::create(['name' => 'permission.index']);
        Permission::create(['name' => 'permission.create']);
        Permission::create(['name' => 'permission.edit']);
        Permission::create(['name' => 'permission.destroy']);
        Permission::create(['name' => 'permission.import']);
        Permission::create(['name' => 'permission.export']);

        //assignpermission
        Permission::create(['name' => 'assign.index']);
        Permission::create(['name' => 'assign.create']);
        Permission::create(['name' => 'assign.edit']);
        Permission::create(['name' => 'assign.destroy']);

        //assingusertorole
        Permission::create(['name' => 'assign.user.index']);
        Permission::create(['name' => 'assign.user.create']);
        Permission::create(['name' => 'assign.user.edit']);

        //menu group
        Permission::create(['name' => 'menu-group.index']);
        Permission::create(['name' => 'menu-group.create']);
        Permission::create(['name' => 'menu-group.edit']);
        Permission::create(['name' => 'menu-group.destroy']);

        //menu item
        Permission::create(['name' => 'menu-item.index']);
        Permission::create(['name' => 'menu-item.create']);
        Permission::create(['name' => 'menu-item.edit']);
        Permission::create(['name' => 'menu-item.destroy']);

        //laporan harian
        Permission::create(['name' => 'laporan-harian.index']);
        Permission::create(['name' => 'laporan-harian.create']);
        Permission::create(['name' => 'laporan-harian.edit']);
        Permission::create(['name' => 'laporan-harian.destroy']);
        // Permission::create(['name' => 'laporan-harian.import']);
        // Permission::create(['name' => 'laporan-harian.export']);

        // smk
        Permission::create(['name' => 'smk.index']);
        Permission::create(['name' => 'smk.create']);
        Permission::create(['name' => 'smk.edit']);
        Permission::create(['name' => 'smk.destroy']);
        // Permission::create(['name' => 'smk.import']);
        // Permission::create(['name' => 'smk.export']);

        // guru
        Permission::create(['name' => 'guru.index']);
        Permission::create(['name' => 'guru.create']);
        Permission::create(['name' => 'guru.edit']);
        Permission::create(['name' => 'guru.destroy']);
        // Permission::create(['name' => 'guru.import']);
        // Permission::create(['name' => 'guru.export']);

        // kelas
        Permission::create(['name' => 'kelas.index']);
        Permission::create(['name' => 'kelas.create']);
        Permission::create(['name' => 'kelas.edit']);
        Permission::create(['name' => 'kelas.destroy']);
        // Permission::create(['name' => 'kelas.import']);
        // Permission::create(['name' => 'kelas.export']);

        // siswa
        Permission::create(['name' => 'siswa.index']);
        Permission::create(['name' => 'siswa.create']);
        Permission::create(['name' => 'siswa.edit']);
        Permission::create(['name' => 'siswa.destroy']);
        // Permission::create(['name' => 'siswa.import']);
        // Permission::create(['name' => 'siswa.export']);

        // dudi
        Permission::create(['name' => 'dudi.index']);
        Permission::create(['name' => 'dudi.create']);
        Permission::create(['name' => 'dudi.edit']);
        Permission::create(['name' => 'dudi.destroy']);
        // Permission::create(['name' => 'dudi.import']);
        // Permission::create(['name' => 'dudi.export']);

        // nilai
        Permission::create(['name' => 'nilai.index']);
        Permission::create(['name' => 'nilai.create']);
        Permission::create(['name' => 'nilai.edit']);
        Permission::create(['name' => 'nilai.destroy']);
        Permission::create(['name' => 'nilai.show']);
        // Permission::create(['name' => 'nilai.import']);
        // Permission::create(['name' => 'nilai.export']);

        // nilai kategori
        Permission::create(['name' => 'nilai.kategori.index']);
        Permission::create(['name' => 'nilai.kategori.create']);
        Permission::create(['name' => 'nilai.kategori.edit']);
        Permission::create(['name' => 'nilai.kategori.destroy']);
        // Permission::create(['name' => 'nilai.kategori.import']);
        // Permission::create(['name' => 'nilai.kategori.export']);

        // magang
        Permission::create(['name' => 'magang.index']);
        Permission::create(['name' => 'magang.create']);
        Permission::create(['name' => 'magang.edit']);
        Permission::create(['name' => 'magang.destroy']);
        // Permission::create(['name' => 'magang.import']);
        // Permission::create(['name' => 'magang.export']);

        // keahlian
        Permission::create(['name' => 'keahlian.index']);
        Permission::create(['name' => 'keahlian.create']);
        Permission::create(['name' => 'keahlian.edit']);
        Permission::create(['name' => 'keahlian.destroy']);
        // Permission::create(['name' => 'keahlian.import']);
        // Permission::create(['name' => 'keahlian.export']);


        // create roles
        $role = Role::create(['name' => 'Super-Admin', 'short_name' => 'SA', 'bg_color' => 'bg-danger']);
        $roleSmk = Role::create(['name' => 'SMK', 'short_name' => 'SK', 'bg_color' => 'bg-primary']);
        $roleDudi = Role::create(['name' => 'DUDI', 'short_name' => 'DD', 'bg_color' => 'bg-warning']);
        $roleGuru = Role::create(['name' => 'Guru', 'short_name' => 'GR', 'bg_color' => 'bg-success']);
        $roleSiswa = Role::create(['name' => 'Siswa', 'short_name' => 'SW', 'bg_color' => 'bg-info']);

        // give permission
        $role->givePermissionTo(Permission::all());

        $roleSmk->givePermissionTo([
            'dashboard',
            'smk.index',
            'smk.edit',
            'user.management',
            'guru.index',
            'guru.create',
            'guru.edit',
            'guru.destroy',
            'siswa.index',
            'siswa.create',
            'siswa.edit',
            'siswa.destroy',
            'dudi.index',
            'edukasi.management',
            'kelas.index',
            'kelas.create',
            'kelas.edit',
            'kelas.destroy',
            'keahlian.index',
            'keahlian.create',
        ]);

        $roleDudi->givePermissionTo([
            'dashboard',
            'dudi.index',
            'dudi.edit',
            'user.management',
            'siswa.index',
            'siswa.create',
            'siswa.edit',
            'siswa.destroy',
            'smk.index',
            'magang.management',
            'magang.index',
            'magang.edit',
            'nilai.index',
            'nilai.create',
            'nilai.edit',
            'nilai.destroy',
            'nilai.show',
            'nilai.kategori.index',
            'nilai.kategori.create',
            'nilai.kategori.edit',
            'nilai.kategori.destroy',
            'laporan.harian.management',
            'laporan-harian.index',
            'edukasi.management',
            'keahlian.index',
            'keahlian.create',
        ]);

        $roleGuru->givePermissionTo([
            'dashboard',
            'user.management',
            'guru.index',
            'guru.edit',
            'siswa.index',
            'magang.management',
            'magang.index',
            'magang.edit',
            'nilai.index',
            'nilai.show',
            'laporan.harian.management',
            'laporan-harian.index',
        ]);

        $roleSiswa->givePermissionTo([
            'dashboard',
            'user.management',
            'siswa.index',
            'siswa.edit',
            'guru.index',
            'magang.management',
            'magang.index',
            'magang.create',
            'dudi.index',
            'nilai.index',
            'nilai.show',
            'laporan.harian.management',
            'laporan-harian.index',
            'laporan-harian.create',
            'laporan-harian.edit',
            'laporan-harian.destroy',
        ]);

        //assign user id 1 ke super admin
        $user = User::find(1);
        $user->assignRole('Super-Admin');

        $users = [2, 3, 4];
        foreach ($users as $userId) {
            $user = User::find($userId);
            $user->assignRole('SMK');
        }

        $users = [5, 6, 7, 8, 9];
        foreach ($users as $userId) {
            $user = User::find($userId);
            $user->assignRole('Guru');
        }

        $users = [10, 11, 12, 13, 14];
        foreach ($users as $userId) {
            $user = User::find($userId);
            $user->assignRole('Siswa');
        }

        $users = [15, 16, 17, 18, 19, 20];
        foreach ($users as $userId) {
            $user = User::find($userId);
            $user->assignRole('DUDI');
        }
    }
}
