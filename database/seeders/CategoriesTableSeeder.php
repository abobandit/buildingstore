<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Строительные материалы', 'slug' => 'building-materials'],
            ['name' => 'Инструменты', 'slug' => 'tools'],
            ['name' => 'Декор', 'slug' => 'decor'],
            ['name' => 'Электрика', 'slug' => 'electricity'],
        ]);
    }
}
