<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $coupons = [
            [
                'code' => '10%DIS',
                'discount_amount' => 10,
                'is_active' => true
            ],
            [
                'code' => '20%DIS',
                'discount_amount' => 20,
                'is_active' => true
            ],
            [
                'code' => '5%DIS',
                'discount_amount' => 5,
                'is_active' => true
            ],
            [
                'code' => '25%DIS',
                'discount_amount' => 25,
                'is_active' => true
            ],
            [
                'code' => '30%DIS',
                'discount_amount' => 30,
                'is_active' => true
            ],
        ];
        DB::table('coupons')->insert($coupons);
    }
}
