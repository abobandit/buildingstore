<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    // Заполняемые поля
    protected $fillable = ['product_id', 'image_path', 'image_name', 'order'];

    // Связь с продуктом
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
