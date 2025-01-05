<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class OrderController extends Controller
{
    public function index()
    {
        return OrderResource::collection(Order::with('items.product')->get());
    }

    public function show($id)
    {
        $order = Order::with('items.product')->findOrFail($id);
        return new OrderResource($order);
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        if ($validated->fails()) {
            return response()->json(['message' => 'validation error'], 401);
        }
        $order = Order::create([
            'user_id' => Auth::id(),
            'total_price' => 0, // пересчитаем ниже
        ]);

        $totalPrice = 0;
        foreach ($request['items'] as $item) {
            $product = Product::findOrFail($item['product_id']);
            $price = $product->discount_price ?? $product->price;
            OrderItem::create([
                'product_id' => $item['product_id'],
                'order_id' => $order->id,
                'quantity' => $item['quantity'],
                'price' => $price,
            ]);
            $cart = Cart::where('user_id', Auth::id())
                ->where('product_id', $item['product_id'])
                ->first();
            $cart->delete();
            $totalPrice += $price * $item['quantity'];
        }

        $order->update(['total_price' => $totalPrice]);

        return new OrderResource($order);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);

        $validated = Validator::make($request->all(),[
            'status' => 'required|string',
        ]);

        $order->update($validated->validated());

        return new OrderResource($order);
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return response()->json(['message' => 'Order deleted successfully'], 204);
    }
}
