<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $quantityFirst = 3;
        $quantitySecond = 5;
        $product = Product::find(1);
        $productSecond = Product::find(2);
        $orders = [
            [
                'user_id' => 1,
                'total_price' => $product->price * $quantityFirst,
                'status' => 'completed'
            ],
            [
                'user_id' => 1,
                'total_price' => $product->price * $quantitySecond,
                'status' => 'created'
            ],
            [
                'user_id' => 1,
                'total_price' => $product->price * ($quantitySecond + $quantityFirst),
                'status' => 'canceled'
            ],
            [
                'user_id' => 1,
                'total_price' => $product->price * ($quantitySecond + $quantityFirst),
                'status' => 'pending'
            ],
            [
                'user_id' => 2,
                'total_price' => $productSecond->price * $quantityFirst,
                'status' => 'completed'
            ],
            [
                'user_id' => 2,
                'total_price' => $productSecond->price * $quantitySecond,
                'status' => 'created'
            ],
            [
                'user_id' => 2,
                'total_price' => $productSecond->price * ($quantitySecond + $quantityFirst),
                'status' => 'canceled'
            ],
            [
                'user_id' => 2,
                'total_price' => $productSecond->price * ($quantitySecond + $quantityFirst),
                'status' => 'pending'
            ],
        ];
        $orderItems= [
            [
                'order_id' => 1,
                'product_id' => $product->id,
                'quantity' => $quantityFirst,
                'price' => $product->price
            ],
            [
                'order_id' => 2,
                'product_id' => $product->id,
                'quantity' => $quantitySecond,
                'price' => $product->price
            ],
            [
                'order_id' => 3,
                'product_id' => $product->id,
                'quantity' => $quantitySecond + $quantityFirst,
                'price' => $product->price
            ],
            [
                'order_id' => 4,
                'product_id' => $product->id,
                'quantity' => $quantitySecond + $quantityFirst,
                'price' => $product->price
            ],
            [
                'order_id' => 5,
                'product_id' => $productSecond->id,
                'quantity' => $quantityFirst,
                'price' => $productSecond->price
            ],
            [
                'order_id' => 6,
                'product_id' => $productSecond->id,
                'quantity' => $quantitySecond,
                'price' => $productSecond->price
            ],
            [
                'order_id' => 7,
                'product_id' => $productSecond->id,
                'quantity' => $quantitySecond + $quantityFirst,
                'price' => $productSecond->price
            ],
            [
                'order_id' => 8,
                'product_id' => $productSecond->id,
                'quantity' => $quantitySecond + $quantityFirst,
                'price' => $productSecond->price
            ],
        ];
        DB::table('orders')->insert($orders);
        DB::table('order_items')->insert($orderItems);
    }
}
