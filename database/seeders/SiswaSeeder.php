<?php

namespace Database\Seeders;

use App\Models\Siswa;
use App\Models\User;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Siswa::create([
            'user_id' => 2,
            'kelas_id' => 1,
            'smk_id' => "12345678",
            'nama' => "Siswa",
            'nisn' => "1261323290",
            'gender' => "L",
            'tempat_lahir' => "Malang",
            'tanggal_lahir' => "2000-01-01",
            'agama' => "Islam",
            'alamat' => "Jl. Raya Anoman",
            'no_telp' => "08123456789",
        ]);
        Siswa::create([
            'user_id' => 6,
            'kelas_id' => 1,
            'smk_id' => "12345678",
            'nama' => "Abulahab",
            'nisn' => "1261323291",
            'gender' => "L",
            'tempat_lahir' => "Malang",
            'tanggal_lahir' => "2000-02-01",
            'agama' => "Islam",
            'alamat' => "Jl. Raya gadang",
            'no_telp' => "08123456779",
        ]);
        User::create([
            'name' => fake()->name(),
            'email' => "siswa3@gmail.com",
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        Siswa::create([
            'user_id' => 7,
            'kelas_id' => 1,
            'smk_id' => "12345678",
            'nama' => fake()->name(),
            'nisn' => "1261323678",
            'gender' => "L",
            'tempat_lahir' => "Malang",
            'tanggal_lahir' => "2000-02-02",
            'agama' => "Islam",
            'alamat' => "Jl. Raya gadang",
            'no_telp' => "08123426779",
        ]);
    }
}
