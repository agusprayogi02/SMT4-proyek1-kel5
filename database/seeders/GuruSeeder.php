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
            'user_id' => 4,
            'smk_id' => "12345678",
            'nip' => "123456789012345678",
            'alamat' => "Jl. Raya Soekarno Hatta",
            'no_telp' => "08123456789",
        ]);
    }
}
