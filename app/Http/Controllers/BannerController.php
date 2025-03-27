<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    function addBanner(Request $request){
        $validator = Validator::make($request->all(),[
            'banner_image' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 400);
        }

        $banner = Banner::create([
            'banner_image' => $request->get('banner_image'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'add banner image success',
            'user'=>$banner],200);
    }

    function getBanners() {
        $banners = Banner::all(); 
    
        return response()->json([
            'status' => 'success',
            'banners' => $banners
        ], 200);
    }
    

    function deleteBanner($id) {
        $validator = Validator::make(['id' => $id], [
            'id' => 'required|int|exists:banners,id',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 400);
        }
    
        $banner = Banner::find($id);  
        if ($banner) {
            $banner->delete(); 
        }
    
        return response()->json([
            'status' => 'success',
            'message' => 'Banner deleted successfully',
        ], 200);
    }
    
    
}
