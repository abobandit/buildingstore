<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cart = [
            [
                'user_id' => 1,
                'product_id'=> 1,
                'quantity' => 3
            ],
            [
                'user_id' => 1,
                'product_id'=> 5,
                'quantity' => 4
            ],
            [
                'user_id' => 1,
                'product_id'=> 22,
                'quantity' => 5
            ],
            [
                'user_id' => 2,
                'product_id'=> 1,
                'quantity' => 3
            ],
            [
                'user_id' => 2,
                'product_id'=> 13,
                'quantity' => 4
            ],
        ];
        DB::table('carts')->insert($cart);
    }
}
