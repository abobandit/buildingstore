<?php

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    public function index()
    {
        // Получаем все товары корзины для текущего пользователя
        $carts = Cart::where('user_id', Auth::id())->with('product')->get();
        return response()->json($carts);
    }

    // Добавить товар в корзину
    public function store(Request $request)
    {
        Validator::make($request->all(),[
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        // Проверка, существует ли уже товар в корзине
        $existingCartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $request->product_id)
            ->first();

        if ($existingCartItem) {
            // Если товар уже есть в корзине, обновим количество
            $existingCartItem->quantity += $request->quantity;
            $existingCartItem->save();
        } else {
            // Если товара нет в корзине, создаем новый
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json(['message' => 'Product added to cart'], 200);
    }

    // Обновить количество товара в корзине
    public function update(Request $request, Cart $cart)
    {
        // Проверка, что товар принадлежит текущему пользователю
        if ($cart->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        Validator::make($request->all(),[
            'quantity' => 'required|integer|min:1',
        ]);

        // Обновление количества товара в корзине
        $cart->quantity = $request->quantity;
        $cart->save();

        return response()->json(['message' => 'Cart updated successfully'], 200);
    }

    // Удалить товар из корзины
    public function destroy(Cart $cart)
    {
        // Проверка, что товар принадлежит текущему пользователю
        if ($cart->user_id !== Auth::id()) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        // Удаляем товар из корзины
        $cart->delete();

        return response()->json(['message' => 'Product removed from cart'], 200);
    }
}
