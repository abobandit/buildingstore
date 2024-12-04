<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Связь с пользователем
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Связь с продуктом
            $table->integer('quantity')->default(1); // Количество товара в корзине
            $table->timestamps(); // Метки времени created_at и updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('carts');
    }
}
