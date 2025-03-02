<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('reviews')->insert([
            ['product_id' => 1, 'user_id' => 7, 'rating' => 5, 'comment' => 'Отличный цемент, удобно использовать.'],
            ['product_id' => 2, 'user_id' => 7, 'rating' => 4, 'comment' => 'Хороший шуруповерт, но немного тяжеловат.'],
            ['product_id' => 3, 'user_id' => 7, 'rating' => 5, 'comment' => 'Прекрасное качество и дизайн.'],
            ['product_id' => 5, 'user_id' => 7, 'rating' => 3, 'comment' => 'Лампа не такая яркая, как я ожидал.'],

            ['product_id' => 1, 'user_id' => 6, 'rating' => 5, 'comment' => 'Отличный цемент, удобно использовать.'],
            ['product_id' => 2, 'user_id' => 6, 'rating' => 4, 'comment' => 'Хороший шуруповерт, но немного тяжеловат.'],
            ['product_id' => 3, 'user_id' => 6, 'rating' => 5, 'comment' => 'Прекрасное качество и дизайн.'],
            ['product_id' => 5, 'user_id' => 6, 'rating' => 3, 'comment' => 'Лампа не такая яркая, как я ожидал.'],
        ]);
    }
}

