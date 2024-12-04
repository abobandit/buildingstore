<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use CategoriesTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            CategoriesTableSeeder::class,
            ProductsTableSeeder::class,
            ReviewsTableSeeder::class,
            CartsTableSeeder::class,
            OrdersTableSeeder::class,
            CouponsTableSeeder::class,
            FavoritesTableSeeder::class,
            OrderItemsTableSeeder::class,
        ]);
    }
}
