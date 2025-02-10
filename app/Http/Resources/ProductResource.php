<?php
namespace App\Http\Resources;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $user = Auth::user();
        $coupon = Coupon::checkUsersCouponAvailability();
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'discount_price' => $coupon ? (100 - $coupon->discount_amount)/100 * $this->price : null,
            'stock' => $this->stock,
            'sku' => $this->sku,
            'category' => new CategoryResource($this->whenLoaded('category')),
            'images' => $this->images ? $this->images->pluck('path') : null,
            'is_favorite' => $user
                ? $this->favorites()->where('user_id', $user->id)->exists()
                : false,
        ];
    }
}
