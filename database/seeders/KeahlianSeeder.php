<?php

namespace Database\Seeders;

use App\Models\Keahlian;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('keahlians')->insert([
            [
                "nama" => "Ilustrasi",
                "bidang" => "Desain Komunikasi Visual",
                "deskripsi" => "Desain Ilustrasi dan Karakter Kartun"
            ], [
                "nama" => "Pemrograman Web",
                "bidang" => "Teknologi Informasi",
                "deskripsi" => "Web Development dan Web Design (Frontend dan Backend)"
            ], [
                "nama" => "Pembukuan",
                "bidang" => "Akuntansi dan Keuangan Lembaga",
                "deskripsi" => "Pembukuan dan Laporan Keuangan Lembaga Non Profit dan Profit"
            ], [
                "nama" => "Pengembangan Aplikasi",
                "bidang" => "Teknologi Informasi",
                "deskripsi" => "Pengembangan Aplikasi Berbasis Desktop dan Mobile"
            ], [
                "nama" => "Game Development",
                "bidang" => "Teknologi Informasi",
                "deskripsi" => "Pengembangan Game dengan Unity dan Unreal Engine"
            ]
        ]);
    }
}
