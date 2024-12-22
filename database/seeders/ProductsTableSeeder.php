<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Убедитесь, что есть категории для привязки продуктов
        $categories = Category::all();

        if ($categories->isEmpty()) {
            $this->command->info('No categories found. Please seed the categories table first.');
            return;
        }

        // Генерация продуктов
        $products = [
            [
                'name' => 'Cement Bag 50kg',
                'slug' => Str::slug('Cement Bag 50kg'),
                'description' => 'High-quality cement for construction purposes.',
                'price' => 8.50,
                'discount_price' => 7.50,
                'category_id' => $categories->random()->id,
                'stock' => 100,
                'sku' => 'CEM50KG',
            ],
            [
                'name' => 'Red Brick',
                'slug' => Str::slug('Red Brick'),
                'description' => 'Durable red bricks for building walls.',
                'price' => 0.30,
                'discount_price' => null,
                'category_id' => $categories->random()->id,
                'stock' => 1000,
                'sku' => 'BRICK001',
            ],
            [
                'name' => 'Steel Rod 12mm',
                'slug' => Str::slug('Steel Rod 12mm'),
                'description' => 'Reinforcement steel rods for concrete.',
                'price' => 25.00,
                'discount_price' => 20.00,
                'category_id' => $categories->random()->id,
                'stock' => 500,
                'sku' => 'STEEL12MM',
            ],
        ];

//        foreach ($products as $product) {
////            Product::create($product);
//        }

        // Добавление случайных продуктов
        Product::factory(50)->create();

        $this->command->info('Products table seeded successfully.');
    }
}
