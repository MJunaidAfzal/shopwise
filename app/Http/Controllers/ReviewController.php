<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;

class ReviewController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'reviews' => 'required',
            'message' => 'required',
        ]);

        $store = Review::create([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'reviews' => $request->reviews,
            'message' => $request->message,
        ]);

        if(!empty($store->id)){
            return redirect()->back()->with('success','Review Added Successfully!');
        }
        else{
            return redirect()->back()->with('error','Something Went Wrong');
        }
    }
}
