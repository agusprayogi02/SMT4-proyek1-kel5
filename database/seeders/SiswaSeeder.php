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
            'user_id' => 10,
            'kelas_id' => 1,
            'smk_id' => "12345678",
            'nama' => "Dhayu Intan Nareswari",
            'nisn' => "1261323290",
            'gender' => "P",
            'tempat_lahir' => "Kebumen",
            'tanggal_lahir' => "2003-10-14",
            'agama' => "Islam",
            'alamat' => "Jl. Raya Arjosari",
            'no_telp' => "08123456789",
        ]);

        Siswa::create([
            'user_id' => 11,
            'kelas_id' => 2,
            'smk_id' => "12345678",
            'nama' => "Agus Prayogi",
            'nisn' => "1261323291",
            'gender' => "L",
            'tempat_lahir' => "Malang",
            'tanggal_lahir' => "2002-08-06",
            'agama' => "Islam",
            'alamat' => "Jl. Raya Gadang",
            'no_telp' => "08123456779",
        ]);

        Siswa::create([
            'user_id' => 12,
            'kelas_id' => 3,
            'smk_id' => "12345678",
            'nama' => 'Diah Putri Nofianti',
            'nisn' => "1261323678",
            'gender' => "P",
            'tempat_lahir' => "Malang",
            'tanggal_lahir' => "2002-11-09",
            'agama' => "Islam",
            'alamat' => "Jl. Raya Supratman",
            'no_telp' => "08123426779",
        ]);
    }
}
