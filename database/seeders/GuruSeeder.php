<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Guru::create([
            'user_id' => 5,
            'smk_id' => "12345678",
            'nip' => "123456789012345678",
            'nama' => "Afif Nuarizki",
            'alamat' => "Jl. Raya Soekarno Hatta",
            'no_telp' => "08123456789",
        ]);

        Guru::create([
            'user_id' => 6,
            'smk_id' => "12345678",
            'nip' => "223456789012345678",
            'nama' => "Bagus Prasetyo",
            'alamat' => "Jl. Raya Hatta",
            'no_telp' => "08523456781",
        ]);
        Guru::create([
            'user_id' => 7,
            'smk_id' => "12345678",
            'nip' => "323456789012345678",
            'nama' => "Chandra Wijaya",
            'alamat' => "Jl. Raya Halim",
            'no_telp' => "08923456789",
        ]);

        Guru::create([
            'user_id' => 8,
            'smk_id' => "12345678",
            'nip' => "423456789012345678",
            'nama' => "Dewi Lestari",
            'alamat' => "Jl. Raya Denial",
            'no_telp' => "08823456789",
        ]);

        Guru::create([
            'user_id' => 9,
            'smk_id' => "12345678",
            'nip' => "523456789012345678",
            'nama' => "Eko Prawoto",
            'alamat' => "Jl. Raya Ijen",
            'no_telp' => "08623456789",
        ]);
    }
}
