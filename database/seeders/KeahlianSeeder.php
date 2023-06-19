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
                "nama" => "Packaging",
                "bidang" => "Desain Komunikasi Visual",
                "deskripsi" => "Desain Kemasan yang Sesuai dengan Produk"
            ], [
                "nama" => "Content Creator",
                "bidang" => "Desain Komunikasi Visual",
                "deskripsi" => "Dokumentasi dengan Foto dan Video pada Social Media"
            ], [
                "nama" => "Jaringan Komputer",
                "bidang" => "Teknologi Jaringan",
                "deskripsi" => "Perancangan, Pengembangan, dan Pemeliharaan Jaringan Komputer"
            ], [
                "nama" => "Sistem Operasi",
                "bidang" => "Teknologi Jaringan",
                "deskripsi" => "Pengelolaan dan Administrasi Sistem Operasi pada Komputer dan Jaringan"
            ], [
                "nama" => "Keamanan Jaringan",
                "bidang" => "Teknologi Jaringan",
                "deskripsi" => "Pengamanan dan perlindungan terhadap jaringan komputer dari ancaman dan serangan yang mungkin terjadi"
            ], [
                "nama" => "Pembukuan",
                "bidang" => "Akuntansi dan Keuangan Lembaga",
                "deskripsi" => "Pembukuan dan Laporan Keuangan Lembaga Non Profit dan Profit"
            ], [
                "nama" => "Perpajakan",
                "bidang" => "Akuntansi dan Keuangan Lembaga",
                "deskripsi" => "Pengelolaan dan Perhitungan Pajak untuk Individu dan Perusahaan"
            ], [
                "nama" => "Audit Internal",
                "bidang" => "Akuntansi dan Keuangan Lembaga",
                "deskripsi" => "Penilaian dan Pemeriksaan Internal terhadap Sistem dan Proses Keuangan Perusahaan"
            ], [
                "nama" => "Pemrograman Web",
                "bidang" => "Teknologi Informasi",
                "deskripsi" => "Web Development dan Web Design (Frontend dan Backend)"
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
