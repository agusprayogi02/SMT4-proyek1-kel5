<?php

namespace Database\Seeders;

use App\Models\Siswa;
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
    }
}
