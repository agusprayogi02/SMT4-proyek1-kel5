<?php

namespace Database\Seeders;

use App\Models\Smk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SmkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Smk::create([
            'user_id' => 2,
            'npsn' => "12345678",
            'nama' => "SMK Negeri 1 Malang",
            'alamat' => "Jl. Teluk Pacitan",
            'no_telp' => "0341479164",
            'kepala_sekolah' => "Achmad Fauzi, S.Pd., M.Pd.",
        ]);

        Smk::create([
            'user_id' => 3,
            'npsn' => "22345678",
            'nama' => "SMK Negeri 1 Kepanjen",
            'alamat' => "Jl. Panji Raya",
            'no_telp' => "0341479164",
            'kepala_sekolah' => "Bambang Sutrisno, S.Pd., M.Pd.",
        ]);

        Smk::create([
            'user_id' => 4,
            'npsn' => "32345678",
            'nama' => "SMK Negeri 1 Gedangan",
            'alamat' => "Jl. Keramat Harapan",
            'no_telp' => "0341479164",
            'kepala_sekolah' => "Sri Wahyuni, S.Pd., M.Pd.",
        ]);
    }
}
