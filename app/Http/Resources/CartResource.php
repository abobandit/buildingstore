<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CartResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $product = Product::find($this->product_id);
        return [
            'created_at' => $this->cretead_at,
            'id' => $this->id,
            'product' => new ProductResource($product),
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'updated_at' => $this->updated_at,
        ];
    }
}
