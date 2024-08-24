<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductFavourite;
use Auth;

class ProductFavouriteController extends Controller
{
    public function store(Request $request){
        if($request->ajax()) {

            $data = $request->all();
            $countfavourite = ProductFavourite::countfavourite($data['product_id']);


            $favourite = new ProductFavourite;
           if($countfavourite == 0){
                $favourite->product_id = $data['product_id'];
                $favourite->user_id = $data['user_id'];
                $favourite->save();
                return response()->json(['action' => 'add' , 'message' => 'Product added to favourite']);
            }
            else{
                ProductFavourite::where(['user_id' => auth()->user()->id , 'product_id' => $data['product_id']])->delete();
                return response()->json(['action' => 'remove' , 'message' => 'Product remove form favourite']);
            }
        }
    }
}
