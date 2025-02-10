<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CouponResource;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    public function index()
    {
        return CouponResource::collection(Coupon::all());
    }


    public function show(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)->first();
        if (!$coupon) return response()->json(['message' => 'купон не найден', 'status' => false]);
        return new CouponResource($coupon);
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
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
