<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => "SuperAdmin",
            'email' => "superadmin@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "Dhayu Intan Nareswari",
            'email' => "siswa.dhayu.ntan@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "Diah Putri Nofianti",
            'email' => "smk.diahputr@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "Agus Prayogi",
            'email' => "agus.apy@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "Dudi PKLand",
            'email' => "dudi.pkland@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        // User::factory()->count(10)->create();
    }
}
