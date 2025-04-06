<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    function addProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'detail' => 'required|string',
            'product_image' => 'required|string',
            'weight' => 'required|string|max:255',
            'price' => 'required|numeric',
            'rating' => 'required|integer',
            'number_sales' => 'required|integer',
            'offer' => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
        ]);


        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 400);
        }

        $Product = Product::create([
            'name' =>  $request->get('name'),
            'detail'  => $request->get('detail'),
            'product_image' => $request->get('product_image'),
            'weight'  => $request->get('weight'),
            'price' => $request->get('price'),
            'rating' => $request->get('rating'),
            'number_sales' => $request->get('number_sales'),
            'offer' => $request->get('offer'),
            'category_id' => $request->category_id,
    'brand_id' => $request->brand_id,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'add Product success',
            'user' => $Product
        ], 200);
    }

    function getOfferProducts()
    {
        $Products = Product::where('offer', true)->get();

        return response()->json([
            'status' => 'success',
            'Products' => $Products
        ], 200);
    }

    function getBestSalesProducts()
    {
        $Products = Product::orderBy('number_sales', 'DESC')->get();

        return response()->json([
            'status' => 'success',
            'Products' => $Products
        ], 200);
    }

    function updateProduct(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|string|max:255',
            'detail' => 'sometimes|string',
            'product_image' => 'sometimes|string',
            'weight' => 'sometimes|string|max:255',
            'price' => 'sometimes|numeric',
            'rating' => 'sometimes|integer',
            'number_sales' => 'sometimes|integer',
            'offer' => 'sometimes|boolean',
            'category_id' => 'sometimes|exists:categories,id',
        'brand_id' => 'sometimes|exists:brands,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 400);
        }

        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found'
            ], 404);
        }

        $product->update($request->all());

        return response()->json([
            'status' => 'success',
            'message' => 'Product updated successfully',
            'product' => $product
        ], 200);
    }


    function deleteProduct($id)
    {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|int|exists:products,id',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 400);
        }

        $Product = Product::find($id);
        if ($Product) {
            $Product->delete();
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Product deleted successfully',
        ], 200);
    }
}
