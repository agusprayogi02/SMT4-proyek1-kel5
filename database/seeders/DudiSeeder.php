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
            'user_id' => 15,
            'nib' => "11465354",
            'nama' => "PT. Indo Ramah Tamah",
            'nama_pemilik' => "Dodi Hermanu",
            'alamat' => "Jl. Raya Budiman",
            'no_telp' => "08123456789",
            'kuota' => 10,
        ]);

        Dudi::create([
            'user_id' => 16,
            'nib' => "14653542",
            'nama' => "CV. Komputerku",
            'nama_pemilik' => "Fajar Setiawan",
            'alamat' => "Jl. Raya Bogor",
            'no_telp' => "08523456789",
            'kuota' => 10,
        ]);

        Dudi::create([
            'user_id' => 17,
            'nib' => "24653542",
            'nama' => "PT. Indofood",
            'nama_pemilik' => "Gatot Subroto",
            'alamat' => "Jl. Raya Jakarta",
            'no_telp' => "08923456789",
            'kuota' => 10,
        ]);

        Dudi::create([
            'user_id' => 18,
            'nib' => "34653542",
            'nama' => "PT. Oanindo",
            'nama_pemilik' => "Martin Sihombing",
            'alamat' => "Jl. Raya Malang",
            'no_telp' => "08823456789",
            'kuota' => 10,
        ]);

        Dudi::create([
            'user_id' => 19,
            'nib' => "44653542",
            'nama' => "Dua Sembilan",
            'nama_pemilik' => "Galih Mohammad",
            'alamat' => "Jl. Raya Meikarta",
            'no_telp' => "08913456789",
            'kuota' => 10,
        ]);

        Dudi::create([
            'user_id' => 20,
            'nib' => "54653542",
            'nama' => "Git Indonesia",
            'nama_pemilik' => "Maliki Yakimura",
            'alamat' => "Jl. Malioboro",
            'no_telp' => "08523156787",
            'kuota' => 10,
        ]);
    }
}
