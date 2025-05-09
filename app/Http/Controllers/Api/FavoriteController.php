<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\FavoriteResource;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $userId = $request->user()->id;
        return FavoriteResource::collection(Favorite::with('product')->where('user_id', $userId)->get());
    }

    public function store(string $id, Request $request)
    {
        $validated = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
        ]);

        $favorite = Favorite::firstOrCreate([
            'user_id' => $request->user()->id,
            'product_id' => $request['product_id'],
        ]);

        return new FavoriteResource($favorite);
    }

    public function destroy($id)
    {

        $favorite = Favorite::where('user_id',Auth::id())->where('product_id',$id)->first();
        $favorite->delete();

        return response()->json(['message' => 'Favorite deleted successfully'], 204);
    }
}
