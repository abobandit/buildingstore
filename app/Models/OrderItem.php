<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // Заполняемые поля
    protected $fillable = ['order_id', 'product_id', 'quantity', 'price'];

    // Связь с заказом
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Связь с продуктом
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
