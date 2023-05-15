<?php

namespace Database\Seeders;

use App\Models\Dudi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DudiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dudi::create([
            'user_id' => 5,
            'nib' => "74653542",
            'nama_pemilik' => "Dodi Hermanu",
            'alamat' => "Jl. Raya Budiman",
            'no_telp' => "08123456789",
            'kuota' => 10,
        ]);
    }
}
