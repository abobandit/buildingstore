<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('calculators', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Тип калькулятора, например: "tile", "paint"
            $table->string('title'); // Название калькулятора
            $table->text('description')->nullable(); // Описание калькулятора
            $table->json('fields'); // Данные о полях калькулятора (чтобы рендерить динамически)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculators');
    }
};
