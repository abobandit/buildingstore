<?php
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ReviewController;
use App\Http\Controllers\Api\FavoriteController;
use App\Http\Controllers\Api\CouponController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Групповые маршруты для аутентификации
Route::prefix('auth')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('profile', [AuthController::class, 'profile'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('cart', [CartController::class, 'index']); // Получить все товары в корзине
    Route::post('cart', [CartController::class, 'store']); // Добавить товар в корзину
    Route::put('cart/{cart}', [CartController::class, 'update']); // Обновить количество товара
    Route::delete('cart/{cart}', [CartController::class, 'destroy']); // Удалить товар из корзины
});
// Маршруты для продуктов
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('products', ProductController::class);
    Route::get('products/{id}/reviews', [ProductController::class, 'reviews']);
    Route::post('products/{id}/add-to-favorites', [FavoriteController::class, 'store']);
    Route::delete('products/{id}/remove-from-favorites', [FavoriteController::class, 'destroy']);
});

// Маршруты для категорий
Route::apiResource('categories', CategoryController::class);

// Маршруты для заказов
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('orders', OrderController::class);
    Route::get('orders/{id}/items', [OrderController::class, 'items']);
});

// Маршруты для отзывов
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('reviews', ReviewController::class);
});

// Маршруты для избранного
Route::middleware('auth:sanctum')->group(function () {
    Route::get('favorites', [FavoriteController::class, 'index']);
});

// Маршруты для купонов
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('coupons', CouponController::class);
    Route::post('coupons/apply', [CouponController::class, 'apply']);
});
