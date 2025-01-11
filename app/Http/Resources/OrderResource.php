<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'total_price' => $this->total_price,
            'status' => $this->status ?? 'pending',
            'created_at' => $this->created_at ,
            'updated_at' => $this->updated_at,
            'pending_at' => $this->pending_at,
            'completed_at' => $this->completed_at ,
            'canceled_at' => $this->canceled_at,
            'items' => OrderItemResource::collection($this->whenLoaded('items')),
        ];
    }
}
