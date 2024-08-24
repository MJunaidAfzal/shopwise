<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BlogFavourite;
use App\Models\Review;
use App\Models\Order;
use Auth;

class UserDashboardController extends Controller
{
    public function dashboard(){
        $data ['title'] = 'User Dashboard';
        return view('user.dashboard',$data);
    }

    public function favourite(){
        $data ['title'] = 'Favorite Blogs List';
        $data ['favourites'] = BlogFavourite::where( 'user_id' , Auth::user()->id )->get();
        return view('user.pages.blog.favourite',$data);
    }

    public function destroy($id){
        $blog = BlogFavourite::find($id);
        $blog->delete();
        if($blog){
            return redirect()->route('user.blog.favourite')->with('success' , 'Blog deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }

    public function review(){
        $data ['title'] = 'Your Reviews';
        $data ['reviews'] = Review::where('user_id',auth()->user()->id)->orderBy('id','ASC')->get();
        return view('user.pages.review.index',$data);
    }


    public function delete($id){
        $review = Review::find($id);
        $review->delete();
        if($review){
            return redirect()->route('user.review.index')->with('success' , 'Review deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }

    public function order(){
        $data ['title'] = 'My Orders';
        $data ['orders'] = Order::where('user_id',auth()->user()->id)->get();
        return view('user.pages.orders.index',$data);
    }

    public function orderView($id){
        $data ['title'] = 'Order Details';
        $data ['order'] = Order::where('id',$id)->where('user_id',auth()->user()->id)->first();
        return view('user.pages.orders.view',$data);
    }
}
