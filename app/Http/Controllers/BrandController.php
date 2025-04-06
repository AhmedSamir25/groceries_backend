<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    function addBrand(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'brand_image' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 400);
        }

        $brand = Brand::create([
            'name' => $request->get('name'),
            'brand_image' => $request->get('brand_image'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'add brand success',
            'brand' => $brand
        ], 200);
    }

    function getAllBrands(){
        $brand = Brand::get();
        return response()->json([
            'status' => 'success',
            'message' => 'get all brands success',
            'brands' => $brand
        ], 200);
    }
}
