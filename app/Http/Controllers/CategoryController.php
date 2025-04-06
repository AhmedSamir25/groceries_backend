<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Categories;

class CategoryController extends Controller
{
    function addCategory(Request $request) {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'category_image' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ],400);
        }

        $category = Categories::create([
            'name' => $request->get('name'),
            'category_image' => $request->get('category_image'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'add category success',
            'category' => $category
        ],200); 
    }

    function getAllCategories(){
        $category = Categories::get();

        return response()->json(
            [
                'status' => 'success',
                'categories' => $category
            ], 200
        );
    }
}
