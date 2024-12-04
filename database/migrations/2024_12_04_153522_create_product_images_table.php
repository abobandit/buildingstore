<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductImagesTable extends Migration
{
    public function up()
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Связь с продуктом
            $table->string('image_path'); // Путь к изображению
            $table->string('image_name'); // Название изображения
            $table->integer('order')->default(0); // Порядок изображения (если необходимо)
            $table->timestamps(); // Метки времени
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_images');
    }
}

