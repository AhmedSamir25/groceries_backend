<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
  
    public function index(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
        ]);

        
        $favorites = Favorite::with('product')->where('user_id', $request->user_id)->get();

        return response()->json(['favorites' => $favorites], 200);
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'product_id' => 'required|exists:products,id',
        ]);

        $favorite = Favorite::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
        ]);

        return response()->json(['message' => 'Product added to favorites', 'favorite' => $favorite], 201);
    }

   
    public function destroy($id)
    {
        $favorite = Favorite::findOrFail($id);
        $favorite->delete();

        return response()->json(['message' => 'Product removed from favorites'], 200);
    }
}
