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
            'name' => "SMK Negeri 1 Malang",
            'email' => "smk.mlg1@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "SMK Negeri 1 Kepanjen",
            'email' => "smk.kpj1@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "SMK Negeri 1 Gedangan",
            'email' => "smk.gdg1@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "Afif Nuarizki",
            'email' => "guru.afif@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "Bagus Prasetyo",
            'email' => "guru.bagus@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "Chandra Wijaya",
            'email' => "guru.chandra@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Dewi Lestari',
            'email' => "guru.dewi@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Eko Prawoto',
            'email' => "guru.eko@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "Agus Prayogi",
            'email' => "siswa.agus@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "Dhayu Intan Nareswari",
            'email' => "siswa.dhayu@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Diah Putri Nofianti',
            'email' => "siswa.diah@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Dimas Danang Saputra',
            'email' => "siswa.dimas@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Mahesa Sialahaan',
            'email' => "siswa.mahesa@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "PT. Indo Ramah Tamah",
            'email' => "dudi.indora@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "CV. Komputerku",
            'email' => "dudi.komp@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "PT. Indofood",
            'email' => "dudi.indofo@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "PT. Oanindo",
            'email' => "dudi.oanindo@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "Dua Sembilan",
            'email' => "dudi.29@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => "Git Indonesia",
            'email' => "dudi.git@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
    }
}
