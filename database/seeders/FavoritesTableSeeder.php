<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $favorites = [
            [
                'user_id' => 1,
                'product_id' => 2
            ],
            [
                'user_id' => 1,
                'product_id' => 3
            ],
            [
                'user_id' => 2,
                'product_id' => 4
            ],
            [
                'user_id' => 2,
                'product_id' => 5
            ],
        ];
        DB::table('favorites')->insert($favorites);
    }
}
