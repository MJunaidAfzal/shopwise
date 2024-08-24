<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogFavourite;
use App\Models\Review;
use App\Models\Order;
use Auth;

class ReaderDashboardController extends Controller
{
    public function dashboard(){
        $data ['title'] = 'Reader Dashboard';
        return view('reader.dashboard',$data);
    }

    public function blog(){
        $data ['title'] = 'Favorite Blogs List';
        $data ['favourites'] = BlogFavourite::where( 'user_id' , Auth::user()->id )->get();
        return view('reader.pages.blog.index',$data);
    }

    public function destroy($id){
        $blog = BlogFavourite::find($id);
        $blog->delete();
        if($blog){
            return redirect()->route('reader.blog.index')->with('success' , 'Blog deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }

    public function review(){
        $data ['title'] = 'Your Reviews';
        $data ['reviews'] = Review::where('user_id',auth()->user()->id)->orderBy('id','ASC')->get();
        return view('reader.pages.review.index',$data);
    }


    public function delete($id){
        $review = Review::find($id);
        $review->delete();
        if($review){
            return redirect()->route('reader.review.index')->with('success' , 'Review deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }

    public function order(){
        $data ['title'] = 'My Orders';
        $data ['orders'] = Order::where('user_id',auth()->user()->id)->get();
        return view('reader.pages.orders.index',$data);
    }

    public function orderView($id){
        $data ['title'] = 'Order Details';
        $data ['order'] = Order::where('id',$id)->where('user_id',auth()->user()->id)->first();
        return view('reader.pages.orders.view',$data);
    }
}
