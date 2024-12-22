<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition(): array
    {
        $name = $this->faker->words(3, true); // Генерирует название из 3 слов

        return [
            'name' => $name,
            'slug' => Str::slug($name),
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 1, 1000), // Цена от 1 до 1000
            'discount_price' => $this->faker->optional()->randomFloat(2, 0.5, 900), // Скидочная цена (необязательно)
            'category_id' => Category::factory(), // Создание связанной категории, если она не передана
            'stock' => $this->faker->numberBetween(0, 500), // Количество на складе
            'sku' => strtoupper($this->faker->bothify('??###')), // Генерация артикула (пример: AB123)
        ];
    }
}
