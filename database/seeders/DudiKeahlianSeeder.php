<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DudiKeahlianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dudi_keahlians')->insert([
            [
                'dudi_id' => '11465354',
                'keahlian_id' => 1
            ], [
                'dudi_id' => '11465354',
                'keahlian_id' => 2
            ], [
                'dudi_id' => '11465354',
                'keahlian_id' => 3
            ], [
                'dudi_id' => '14653542',
                'keahlian_id' => 4
            ], [
                'dudi_id' => '14653542',
                'keahlian_id' => 5
            ], [
                'dudi_id' => '14653542',
                'keahlian_id' => 6
            ], [
                'dudi_id' => '14653542',
                'keahlian_id' => 11
            ], [
                'dudi_id' => '24653542',
                'keahlian_id' => 7
            ], [
                'dudi_id' => '24653542',
                'keahlian_id' => 8
            ], [
                'dudi_id' => '24653542',
                'keahlian_id' => 9
            ], [
                'dudi_id' => '34653542',
                'keahlian_id' => 3
            ], [
                'dudi_id' => '34653542',
                'keahlian_id' => 6
            ], [
                'dudi_id' => '34653542',
                'keahlian_id' => 8
            ], [
                'dudi_id' => '34653542',
                'keahlian_id' => 10
            ], [
                'dudi_id' => '34653542',
                'keahlian_id' => 11
            ], [
                'dudi_id' => '44652929',
                'keahlian_id' => 4
            ], [
                'dudi_id' => '44652929',
                'keahlian_id' => 5
            ], [
                'dudi_id' => '44652929',
                'keahlian_id' => 11
            ], [
                'dudi_id' => '54653542',
                'keahlian_id' => 4
            ], [
                'dudi_id' => '54653542',
                'keahlian_id' => 5
            ], [
                'dudi_id' => '54653542',
                'keahlian_id' => 6
            ], [
                'dudi_id' => '54653542',
                'keahlian_id' => 10
            ], [
                'dudi_id' => '54653542',
                'keahlian_id' => 11
            ], [
                'dudi_id' => '54653542',
                'keahlian_id' => 12
            ]
        ]);
    }
}
