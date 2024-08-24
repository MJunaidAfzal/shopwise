<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;

class ReviewsController extends Controller
{


    public function review(){
        $data ['title'] = 'Product Reviews';
        $data ['reviews'] = Review::orderBy('id','ASC')->get();
        return view('admin.pages.review.index',$data);
    }


    public function destroy($id){
        $review = Review::find($id);
        $review->delete();
        if($review){
            return redirect()->route('admin.review.index')->with('success' , 'Review deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }
}
