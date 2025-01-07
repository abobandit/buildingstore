<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Заполняемые поля
    protected $fillable = ['name','stock','sku', 'description', 'price', 'slug','category_id'];

    // Связь с категорией
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Связь с отзывами
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    // Связь с корзинами
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // Связь с заказами через заказанные товары
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // Связь с избранными товарами
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}
