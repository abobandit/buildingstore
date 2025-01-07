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
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
            'pending_at' => $this->pending_at ? $this->pending_at->toDateTimeString() : null,
            'completed_at' => $this->completed_at ? $this->completed_at->toDateTimeString() : null,
            'canceled_at' => $this->canceled_at ? $this->canceled_at->toDateTimeString() : null,
            'items' => OrderItemResource::collection($this->whenLoaded('items')),
        ];
    }
}
