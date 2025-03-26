<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    function AddBanner(Request $request){
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
}
