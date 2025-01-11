<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $products = [
            // Строительные материалы
            [
                'name' => 'Цемент М400',
                'slug' => Str::slug('Цемент М400'),
                'description' => 'Высококачественный цемент для строительных работ.',
                'price' => 350,
                'discount_price' => 320,
                'category_id' => 1,
                'stock' => 100,
                'sku' => 'STM-001',
            ],
            [
                'name' => 'Кирпич красный строительный',
                'slug' => Str::slug('Кирпич красный строительный'),
                'description' => 'Прочный кирпич для возведения стен.',
                'price' => 15,
                'discount_price' => 12,
                'category_id' => 1,
                'stock' => 500,
                'sku' => 'STM-002',
            ],
            [
                'name' => 'Песок речной строительный',
                'slug' => Str::slug('Песок речной строительный'),
                'description' => 'Чистый речной песок для растворов.',
                'price' => 1200,
                'discount_price' => 1100,
                'category_id' => 1,
                'stock' => 50,
                'sku' => 'STM-003',
            ],
            [
                'name' => 'Арматура 12 мм',
                'slug' => Str::slug('Арматура 12 мм'),
                'description' => 'Стальная арматура для армирования конструкций.',
                'price' => 80,
                'discount_price' => 75,
                'category_id' => 1,
                'stock' => 200,
                'sku' => 'STM-004',
            ],
            [
                'name' => 'Гипсокартон влагостойкий',
                'slug' => Str::slug('Гипсокартон влагостойкий'),
                'description' => 'Плита гипсокартона для влажных помещений.',
                'price' => 450,
                'discount_price' => 420,
                'category_id' => 1,
                'stock' => 300,
                'sku' => 'STM-005',
            ],

            // Инструменты
            [
                'name' => 'Дрель ударная 800 Вт',
                'slug' => Str::slug('Дрель ударная 800 Вт'),
                'description' => 'Мощная ударная дрель для работы по бетону.',
                'price' => 3200,
                'discount_price' => 3000,
                'category_id' => 2,
                'stock' => 20,
                'sku' => 'INS-001',
            ],
            [
                'name' => 'Болгарка 125 мм',
                'slug' => Str::slug('Болгарка 125 мм'),
                'description' => 'Универсальная угловая шлифмашина.',
                'price' => 2500,
                'discount_price' => 2300,
                'category_id' => 2,
                'stock' => 30,
                'sku' => 'INS-002',
            ],
            [
                'name' => 'Рулетка 5 м',
                'slug' => Str::slug('Рулетка 5 м'),
                'description' => 'Компактная и прочная рулетка для измерений.',
                'price' => 200,
                'discount_price' => 180,
                'category_id' => 2,
                'stock' => 100,
                'sku' => 'INS-003',
            ],
            [
                'name' => 'Отвёртка универсальная',
                'slug' => Str::slug('Отвёртка универсальная'),
                'description' => 'Многофункциональная отвёртка с насадками.',
                'price' => 350,
                'discount_price' => 300,
                'category_id' => 2,
                'stock' => 150,
                'sku' => 'INS-004',
            ],
            [
                'name' => 'Молоток строительный',
                'slug' => Str::slug('Молоток строительный'),
                'description' => 'Прочный молоток для строительных и бытовых задач.',
                'price' => 500,
                'discount_price' => 450,
                'category_id' => 2,
                'stock' => 75,
                'sku' => 'INS-005',
            ],

            // Декор
            [
                'name' => 'Обои виниловые с рисунком',
                'slug' => Str::slug('Обои виниловые с рисунком'),
                'description' => 'Качественные обои для стильного интерьера.',
                'price' => 900,
                'discount_price' => 850,
                'category_id' => 3,
                'stock' => 200,
                'sku' => 'DEC-001',
            ],
            [
                'name' => 'Краска интерьерная белая',
                'slug' => Str::slug('Краска интерьерная белая'),
                'description' => 'Белая краска для создания идеального финиша.',
                'price' => 700,
                'discount_price' => 650,
                'category_id' => 3,
                'stock' => 100,
                'sku' => 'DEC-002',
            ],
            [
                'name' => 'Декоративный камень под кирпич',
                'slug' => Str::slug('Декоративный камень под кирпич'),
                'description' => 'Элегантный декоративный материал для стен.',
                'price' => 1500,
                'discount_price' => 1400,
                'category_id' => 3,
                'stock' => 50,
                'sku' => 'DEC-003',
            ],
            [
                'name' => 'Светодиодная лента 5 м',
                'slug' => Str::slug('Светодиодная лента 5 м'),
                'description' => 'Энергоэффективная лента для подсветки.',
                'price' => 1200,
                'discount_price' => 1100,
                'category_id' => 3,
                'stock' => 80,
                'sku' => 'DEC-004',
            ],
            [
                'name' => 'Панно для стен (металлическое)',
                'slug' => Str::slug('Панно для стен (металлическое)'),
                'description' => 'Декоративное панно для украшения интерьера.',
                'price' => 3000,
                'discount_price' => 2800,
                'category_id' => 3,
                'stock' => 30,
                'sku' => 'DEC-005',
            ],

            // Электрика
            [
                'name' => 'Кабель ВВГнг 3х2,5',
                'slug' => Str::slug('Кабель ВВГнг 3х2,5'),
                'description' => 'Кабель для проводки с защитой от горения.',
                'price' => 120,
                'discount_price' => 110,
                'category_id' => 4,
                'stock' => 500,
                'sku' => 'ELE-001',
            ],
            [
                'name' => 'Розетка двойная с заземлением',
                'slug' => Str::slug('Розетка двойная с заземлением'),
                'description' => 'Безопасная розетка для бытового использования.',
                'price' => 250,
                'discount_price' => 220,
                'category_id' => 4,
                'stock' => 200,
                'sku' => 'ELE-002',
            ],
            [
                'name' => 'Светильник потолочный светодиодный',
                'slug' => Str::slug('Светильник потолочный светодиодный'),
                'description' => 'Энергоэффективный потолочный светильник.',
                'price' => 2000,
                'discount_price' => 1800,
                'category_id' => 4,
                'stock' => 50,
                'sku' => 'ELE-003',
            ],
            [
                'name' => 'Лампа LED 10 Вт',
                'slug' => Str::slug('Лампа LED 10 Вт'),
                'description' => 'Яркая и долговечная светодиодная лампа.',
                'price' => 150,
                'discount_price' => 130,
                'category_id' => 4,
                'stock' => 300,
                'sku' => 'ELE-004',
            ],
            [
                'name' => 'Автоматический выключатель 16А',
                'slug' => Str::slug('Автоматический выключатель 16А'),
                'description' => 'Надёжная защита электросети.',
                'price' => 350,
                'discount_price' => 320,
                'category_id' => 4,
                'stock' => 100,
                'sku' => 'ELE-005',
            ],

            // Отопление и сантехника
            [
                'name' => 'Котёл газовый настенный',
                'slug' => Str::slug('Котёл газовый настенный'),
                'description' => 'Эффективное решение для отопления вашего дома.',
                'price' => 30000,
                'discount_price' => 28000,
                'category_id' => 5,
                'stock' => 10,
                'sku' => 'HTS-001',
            ],
            [
                'name' => 'Радиатор стальной 12 секций',
                'slug' => Str::slug('Радиатор стальной 12 секций'),
                'description' => 'Энергосберегающий радиатор отопления.',
                'price' => 5000,
                'discount_price' => 4700,
                'category_id' => 5,
                'stock' => 20,
                'sku' => 'HTS-002',
            ],
            [
                'name' => 'Труба полипропиленовая 20 мм',
                'slug' => Str::slug('Труба полипропиленовая 20 мм'),
                'description' => 'Труба для водопроводных и отопительных систем.',
                'price' => 100,
                'discount_price' => 90,
                'category_id' => 5,
                'stock' => 100,
                'sku' => 'HTS-003',
            ],
            [
                'name' => 'Смеситель для ванной комнаты',
                'slug' => Str::slug('Смеситель для ванной комнаты'),
                'description' => 'Смеситель с антикоррозийным покрытием.',
                'price' => 3000,
                'discount_price' => 2800,
                'category_id' => 5,
                'stock' => 40,
                'sku' => 'HTS-004',
            ],
            [
                'name' => 'Душевая лейка с функцией массажа',
                'slug' => Str::slug('Душевая лейка с функцией массажа'),
                'description' => 'Многофункциональная душевая лейка.',
                'price' => 800,
                'discount_price' => 750,
                'category_id' => 5,
                'stock' => 60,
                'sku' => 'HTS-005',
            ],

            // Окна и двери
            [
                'name' => 'Оконный стеклопакет 3х камерный',
                'slug' => Str::slug('Оконный стеклопакет 3х камерный'),
                'description' => 'Тёплый и надёжный стеклопакет для вашего дома.',
                'price' => 12000,
                'discount_price' => 11500,
                'category_id' => 6,
                'stock' => 15,
                'sku' => 'WND-001',
            ],
            [
                'name' => 'Металлическая входная дверь',
                'slug' => Str::slug('Металлическая входная дверь'),
                'description' => 'Надёжная дверь с тепло- и шумоизоляцией.',
                'price' => 25000,
                'discount_price' => 24000,
                'category_id' => 6,
                'stock' => 5,
                'sku' => 'WND-002',
            ],
            [
                'name' => 'Межкомнатная дверь с рисунком',
                'slug' => Str::slug('Межкомнатная дверь с рисунком'),
                'description' => 'Стильная межкомнатная дверь для современного интерьера.',
                'price' => 8000,
                'discount_price' => 7500,
                'category_id' => 6,
                'stock' => 20,
                'sku' => 'WND-003',
            ],
            [
                'name' => 'Ручка дверная классическая',
                'slug' => Str::slug('Ручка дверная классическая'),
                'description' => 'Элегантная ручка для межкомнатных дверей.',
                'price' => 1200,
                'discount_price' => 1100,
                'category_id' => 6,
                'stock' => 100,
                'sku' => 'WND-004',
            ],
            [
                'name' => 'Уплотнитель для окон и дверей',
                'slug' => Str::slug('Уплотнитель для окон и дверей'),
                'description' => 'Уплотнитель для защиты от сквозняков.',
                'price' => 300,
                'discount_price' => 280,
                'category_id' => 6,
                'stock' => 200,
                'sku' => 'WND-005',
            ],
        ];

        DB::table('products')->insert($products);
    }
}
