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
            'user_id' => 3,
            'npsn' => "12345678",
            'alamat' => "Jl. Teluk Pacitan",
            'no_telp' => "0341479164",
            'kepala_sekolah' => "Moh. Guntur",
        ]);
    }
}
