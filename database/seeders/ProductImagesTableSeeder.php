<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();

        if ($products->isEmpty()) {
            $this->command->info('No products found. Please seed the products table first.');
            return;
        }

        foreach ($products as $product) {
            // Добавляем 1–5 изображений для каждого продукта
            ProductImage::factory()->count(rand(1, 5))->create([
                'product_id' => $product->id,
            ]);
        }

        $this->command->info('Product images table seeded successfully.');

    }
}
