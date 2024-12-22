<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    // Заполняемые поля
    protected $fillable = ['code', 'discount_amount','valid_until'];

    // Связь с заказами
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
