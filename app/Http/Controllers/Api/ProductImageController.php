<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductImageController extends Controller
{
    public function storeProductImage(Request $request, $productId)
    {
        Validator::make($request->all(),[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $image = $request->file('image');
        $imageName = time().'_'.$image->getClientOriginalName();
        $imagePath = $image->storeAs('public/product_images', $imageName);

        // Сохраняем в базу данных
        $productImage = new ProductImage();
        $productImage->product_id = $productId;
        $productImage->image_path = $imagePath;
        $productImage->image_name = $imageName;
        $productImage->save();

        return response()->json(['message' => 'Image uploaded successfully'], 200);
    }
}
