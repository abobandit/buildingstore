<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    public function index(Request $request)
    {
        $productId = $request->query('product_id');
        return ReviewResource::collection(
            Review::where('product_id', $productId)->latest()->paginate(10)
        );
    }

    public function store(Request $request)
    {
        $validated = Validator::make($request->all(),[
            'product_id' => 'required|exists:products,id',
            'comment' => 'required|string',
            'rating' => 'required|integer|min:1|max:5',
        ]);

        $review = Review::create([
            'user_id' => $request->user()->id,
            'product_id' => $validated['product_id'],
            'comment' => $validated['comment'],
            'rating' => $validated['rating'],
        ]);

        return new ReviewResource($review);
    }

    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete();

        return response()->json(['message' => 'Review deleted successfully'], 204);
    }
}
