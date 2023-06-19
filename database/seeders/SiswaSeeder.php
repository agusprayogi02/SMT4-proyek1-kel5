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
            'kelas_id' => 2,
            'smk_id' => "12345678",
            'nama' => "Agus Prayogi",
            'nisn' => "2141720025",
            'gender' => "L",
            'tempat_lahir' => "Malang",
            'tanggal_lahir' => "2002-08-06",
            'agama' => "Islam",
            'alamat' => "Jl. Raya Gadang",
            'no_telp' => "08123456779",
        ]);

        Siswa::create([
            'user_id' => 11,
            'kelas_id' => 5,
            'smk_id' => "12345678",
            'nama' => "Dhayu Intan Nareswari",
            'nisn' => "2141720026",
            'gender' => "P",
            'tempat_lahir' => "Kebumen",
            'tanggal_lahir' => "2003-10-14",
            'agama' => "Islam",
            'alamat' => "Jl. Raya Arjosari",
            'no_telp' => "08123456789",
        ]);

        Siswa::create([
            'user_id' => 12,
            'kelas_id' => 8,
            'smk_id' => "12345678",
            'nama' => 'Diah Putri Nofianti',
            'nisn' => "2141720054",
            'gender' => "P",
            'tempat_lahir' => "Malang",
            'tanggal_lahir' => "2002-11-09",
            'agama' => "Islam",
            'alamat' => "Jl. Raya Supratman",
            'no_telp' => "08123426779",
        ]);

        Siswa::create([
            'user_id' => 13,
            'kelas_id' => 12,
            'smk_id' => "12345678",
            'nama' => 'Dimas Danang Saputra',
            'nisn' => "2141720003",
            'gender' => "L",
            'tempat_lahir' => "Bali",
            'tanggal_lahir' => "2001-01-01",
            'agama' => "Hindu",
            'alamat' => "Jl. Iwak Ikan",
            'no_telp' => "08123426779",
        ]);

        Siswa::create([
            'user_id' => 14,
            'kelas_id' => 3,
            'smk_id' => "12345678",
            'nama' => 'Mahesa Sialahaan',
            'nisn' => "2141720066",
            'gender' => "L",
            'tempat_lahir' => "Medan",
            'tanggal_lahir' => "2002-02-14",
            'agama' => "Kristen",
            'alamat' => "Jl. Bapak Pendekar",
            'no_telp' => "08123426779",
        ]);
    }
}
