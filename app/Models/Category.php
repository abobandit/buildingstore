<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Указываем, что не будем использовать timestamps в этой модели
    public $timestamps = false;

    // Заполняемые поля
    protected $fillable = ['name', 'slug'];

    // Связь с продуктами
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
