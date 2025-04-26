<?php
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CalculatorController;
use App\Http\Controllers\Api\CartController;
use App\Http\Controllers\Api\ImageController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\CouponController;
use App\Http\Controllers\Api\UserController;
use App\Http\Resources\UserResource;
use App\Models\Coupon;
use Illuminate\Support\Facades\Route;
//fetch('/api/auth/register',)
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/
//localhost:90/api/auth/register
// Групповые маршруты для аутентификации
Route::get('/me',function (){
    return new UserResource(auth()->user()) ;
});
Route::post('reviews/get', [ReviewController::class,'index']);

Route::get('/images/{path}/{width}x{height}', [ImageController::class, 'getResizedImage'])
    ->where('path', '.*')
    ->where('width', '[0-9]+')
    ->where('height', '[0-9]+');
Route::get('products', [ProductController::class,'index'])->middleware( 'optional.auth');;
Route::post('productsByIds', [ProductController::class,'getByIds'])->middleware( 'optional.auth');;
Route::post('search', [ProductController::class,'search']);
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('profile', [AuthController::class, 'profile'])->middleware('auth:sanctum');
    Route::post('edit', [UserController::class, 'update'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('cart', [CartController::class, 'index']); // Получить все товары в корзине
    Route::post('cart', [CartController::class, 'store']); // Добавить товар в корзину
    Route::put('cart/{cart}', [CartController::class, 'update']); // Обновить количество товара
    Route::delete('cart/{cart}', [CartController::class, 'destroy']); // Удалить товар из корзины
});
// Маршруты для продуктов
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('products', ProductController::class)->except([
        'index'
    ]);
    Route::get('products/{id}/reviews', [ProductController::class, 'reviews']);
    Route::post('products/{id}/add-to-favorites', [FavoriteController::class, 'store']);
    Route::delete('products/{id}/remove-from-favorites', [FavoriteController::class, 'destroy']);
});

// Маршруты для категорий
Route::apiResource('categories', CategoryController::class);

// Маршруты для заказов
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('orders', OrderController::class)->except('store','index');
    Route::get('orders/{id}/items', [OrderController::class, 'items']);
});

// Маршруты для отзывов
Route::middleware('auth:sanctum')->prefix('reviews')->group(function () {
    Route::post('make', [ReviewController::class,'store']);
    Route::delete('{id}', [ReviewController::class,'delete']);
});

// Маршруты для избранного
Route::middleware('auth:sanctum')->group(function () {
    Route::get('favorites', [FavoriteController::class, 'index']);
});

// Маршруты для купонов
Route::middleware('auth:sanctum')->prefix('coupons')->group(function () {
    Route::get('{id}', [CouponController::class,'show']);
    Route::post('activate', [Coupon::class,'activateCouponForUser']);
    Route::post('deactivate', [Coupon::class,'deactivateCouponForUser']);
});

// Маршруты для админ панели
Route::middleware(['auth:sanctum','admin'])->group(function () {
    Route::apiResource('coupons', CouponController::class);
    Route::get('allOrders', [OrderController::class,'allOrders']);
    Route::apiResource('orders', OrderController::class)->except('update');
    Route::post('orders/{id}', [OrderController::class,'update']);
    Route::post('coupons/apply', [CouponController::class, 'apply']);
});
//калькуляторы
Route::middleware('auth:sanctum')->group(function(){
    Route::post('calculatePaint', [CalculatorController::class, 'calculatePaint']);
    Route::post('calculateTile', [CalculatorController::class, 'calculateTile']);
    Route::apiResource('calculators',CalculatorController::class);

});
