<?php

namespace Database\Seeders;

use App\Models\Kelas;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kelas')->insert([
            [
                'nama' => 'XI RPL 1',
                'jurusan' => 'Rekayasa Perangkat Lunak'
            ], [
                'nama' => 'XI RPL 2',
                'jurusan' => 'Rekayasa Perangkat Lunak'
            ], [
                'nama' => 'XI RPL 3',
                'jurusan' => 'Rekayasa Perangkat Lunak'
            ], [
                'nama' => 'XI RPL 4',
                'jurusan' => 'Rekayasa Perangkat Lunak'
            ], [
                'nama' => 'XI OTKP 1',
                'jurusan' => 'Otomatisasi Tata Kelola Perkantoran'
            ], [
                'nama' => 'XI OTKP 2',
                'jurusan' => 'Otomatisasi Tata Kelola Perkantoran'
            ], [
                'nama' => 'XI OTKP 3',
                'jurusan' => 'Otomatisasi Tata Kelola Perkantoran'
            ], [
                'nama' => 'XI MM 1',
                'jurusan' => 'Multimedia'
            ], [
                'nama' => 'XI MM 2',
                'jurusan' => 'Multimedia'
            ], [
                'nama' => 'XI MM 3',
                'jurusan' => 'Multimedia'
            ], [
                'nama' => 'XI TKJ 1',
                'jurusan' => 'Teknik Komputer dan Jaringan'
            ], [
                'nama' => 'XI TKJ 2',
                'jurusan' => 'Teknik Komputer dan Jaringan'
            ], [
                'nama' => 'XI TKJ 3',
                'jurusan' => 'Teknik Komputer dan Jaringan'
            ],
        ]);
    }
}
