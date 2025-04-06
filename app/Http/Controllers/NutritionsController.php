<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Nutritions;

class NutritionsController extends Controller
{
    function addProductNutritions(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|integer',
            'size' => 'required|numeric',
            'calories' => 'required|numeric',
            'water' => 'numeric',
            'protein' => 'numeric',
            'carbohydrates' => 'numeric',
            'sugar' => 'numeric',
            'fiber' => 'numeric',
            'fat' => 'numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 400);
        }

        $nutritions = Nutritions::create([

            'size' => $request->get('size'),
            'calories' => $request->get('calories'),
            'water' => $request->get('water'),
            'protein' => $request->get('protein'),
            'carbohydrates' => $request->get('carbohydrates'),
            'sugar' => $request->get('sugar'),
            'fiber' => $request->get('fiber'),
            'fat' => $request->get('fat'),
            'product_id' => $request->product_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'add nutritions success',
            'nutritions' => $nutritions
        ], 200);
    }


    function getAllNutritions($id)
    {
        $nutrition = Nutritions::find($id);

        if (!$nutrition) {
            return response()->json([
                'status' => 'error',
                'message' => 'Nutrition data not found'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'nutrition' => $nutrition
        ], 200);
    }
}
