<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        return CouponResource::collection(Coupon::where('is_active', true)->get());
    }

    public function show($id)
    {
        $coupon = Coupon::findOrFail($id);
        return new CouponResource($coupon);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'code' => 'required|string|unique:coupons',
            'discount_amount' => 'required|numeric|min:0',
            'valid_until' => 'required|date',
        ]);

        $coupon = Coupon::create($validated);

        return new CouponResource($coupon);
    }

    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return response()->json(['message' => 'Coupon deleted successfully'], 204);
    }
}
