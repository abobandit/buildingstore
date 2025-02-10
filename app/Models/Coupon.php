<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function auth as auth;

class Coupon extends Model
{
    use HasFactory;


    // Заполняемые поля
    protected $fillable = ['code', 'discount_amount', 'valid_until', 'is_active'];

    // Связь с заказами
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Связь с заказами
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_coupons', 'coupon_id', 'user_id');
    }

    public static function findCoupons($code)
    {
        return Coupon::where('code', $code)->first();
    }

    public static function activateCouponForUser(Request $request): array
    {
        $code = $request->code;
        $coupon = self::checkCouponAvailable($code);
        if ($coupon['status'] ) {
            if (!self::checkUsersCouponAvailability($code)){
                $coupon['coupon']->users()->attach(Auth::id());
            } elseif (self::checkUsedUsersCoupons($code)){
                return ['message' => 'купон уже был использован', 'coupon' => $coupon["coupon"], 'status' => true];
            };
        }
        return $coupon;
    }

    public static function deactivateCouponForUser(Request $request): array
    {
        $coupon = self::checkCouponAvailable($request->code);
        if ($coupon['status']) {
            $coupon['coupon']->users()->sync([Auth::id() => ['status' => 'used']]);
        }
        return $coupon;
    }

    public static function checkCouponAvailable($code): array
    {
        $coupon = self::findCoupons($code);
        if ($coupon) return ['message' => 'купон найден', 'coupon' => $coupon, 'status' => true];
        else return ['message' => 'купон не найден', 'coupon' => null, 'status' => false];
    }

    public static function checkUsedUsersCoupons($code)
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return null;
        }
        $id = $user->id;
        $coupon = Coupon::where('code',$code)->first();
        if ($coupon){
            $usedCoupon = UserCoupons::where('user_id', $id)
                ->where('status', 'used')
                ->where('coupon_id', $coupon->id)
                ->first();
            return $usedCoupon;
        }
        return null;
    }

    public static function checkActiveUsersCoupons(): ?Coupon
    {
        $user = Auth::guard('sanctum')->user();
        if (!$user) {
            return null;
        }
        $id = $user->id;
        $userCoupon = UserCoupons::where('user_id', $id)
            ->where('status', 'active')
            ->first();

        return $userCoupon ? Coupon::find($userCoupon->coupon_id) : null;

    }

    public static function checkUsersCouponAvailability($code = null)
    {
        return self::checkUsedUsersCoupons($code) ?? self::checkActiveUsersCoupons() ?? false;
    }
}
