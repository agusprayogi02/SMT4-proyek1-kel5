<?php

namespace Database\Seeders;

use App\Models\Category;
use DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Disiplin'],
            ['name' => 'Etika'],
            ['name' => 'Inisiatif'],
            ['name' => 'Kebersihan'],
            ['name' => 'Kehadiran'],
            ['name' => 'Kejujuran'],
            ['name' => 'Kerjasama'],
            ['name' => 'Komunikasi'],
            ['name' => 'Kreatifitas'],
            ['name' => 'Tanggungjawab'],
        ]);
        //Category::factory()->count(5)->create();
    }
}
