<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        return ProductResource::collection(Product::with('category')->with('favorites')->paginate(10));
    }
    public function getByIds(Request $request)
    {
        return ProductResource::collection(Product::whereIn('id', $request->product_ids)->with('category')->with('favorites')->paginate(10));
    }
    public function search(Request $request)
    {
        // Получаем строку поиска из запроса
        $query = $request->input('query', '');

        // Проверяем, что строка не пуста
        if (empty($query)) {
            return response()->json([
                'message' => 'Поиск не может быть пустым',
            ], 400);
        }

        // Ищем продукты по подстроке в полях name и sku
        $products = Product::where('name', 'LIKE', "%{$query}%")
            ->orWhere('sku', 'LIKE', "%{$query}%")
            ->get();

        return response()->json($products);
    }
    public function show($id)
    {
        $product = Product::with('category', 'images')->findOrFail($id);
        return new ProductResource($product);
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'slug' => 'required|string|unique:products',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'nullable|integer',
        ]);
        $product = Product::create($validated->validated());

        return new ProductResource($product);
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = Validator::make($request->all(),[
            'name' => 'sometimes|string|max:255',
            'slug' => 'sometimes|string|unique:products,slug,' . $id,
            'price' => 'sometimes|numeric|min:0',
            'category_id' => 'sometimes|exists:categories,id',
        ]);

        $product->update($validated->validated());

        return new ProductResource($product);
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 204);
    }
}
