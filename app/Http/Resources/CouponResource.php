<?php
namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
class CouponResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'discount_amount' => $this->discount_amount,
            'valid_until' =>Carbon::parse($this->valid_until),
            'is_active' => $this->is_active,
        ];
    }
}
