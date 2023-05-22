<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            UserSeeder::class,
            MenuGroupSeeder::class,
            MenuItemSeeder::class,
            CategorySeeder::class,
            SmkSeeder::class,
            KelasSeeder::class,
            SiswaSeeder::class,
            KeahlianSeeder::class,
            GuruSeeder::class,
            DudiSeeder::class,
            RoleAndPermissionSeeder::class,
        ]);
    }
}
