<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Строительные материалы', 'slug' => 'building-materials', 'description' => 'Надежные и качественные материалы для любых строительных проектов. В нашем ассортименте вы найдете цемент, кирпич, песок, гипсокартон и многое другое для создания прочного фундамента и долговечных конструкций'],
            ['name' => 'Инструменты', 'slug' => 'tools', 'description' => 'От простых ручных инструментов до профессионального электрооборудования — у нас есть всё для работы любой сложности. Винты, перфораторы, болгарки, дрели и многое другое для точной и эффективной работы.'],
            ['name' => 'Декор', 'slug' => 'decor', 'description' => 'Превратите интерьер в произведение искусства! Декоративные покрытия, элементы декора, обои, краски и другие материалы для стильного и уютного пространства.'],
            ['name' => 'Электрика', 'slug' => 'electricity', 'description' => 'Всё, что нужно для безопасного и эффективного электромонтажа. Кабели, розетки, выключатели, лампы, светильники и современные решения для энергосбережения.'],
            ['name' => 'Отопление и сантехника', 'slug' => 'heating-and-plumbing', 'description' => 'Решения для создания комфортного климата и функциональной системы водоснабжения. Радиаторы, трубы, котлы, краны и всё необходимое для теплого дома и надежной сантехники.'],
            ['name' => 'Окна и двери', 'slug' => 'windows-and-doors', 'description' => 'Широкий выбор оконных и дверных конструкций, сочетающих стиль и надежность. Готовые решения для вашего дома, офиса или любого другого пространства.'],
        ]);
    }
}
