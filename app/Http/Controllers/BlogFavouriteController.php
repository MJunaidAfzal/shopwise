<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogFavourite;
use Auth;

class BlogFavouriteController extends Controller
{
    public function store(Request $request){
        if($request->ajax()) {

            $data = $request->all();
            $countfavourite = BlogFavourite::countfavourite($data['blog_id']);


            $favourite = new BlogFavourite;
           if($countfavourite == 0){
                $favourite->blog_id = $data['blog_id'];
                $favourite->user_id = $data['user_id'];
                $favourite->save();
                return response()->json(['action' => 'add' , 'message' => 'Blog added to favourite']);
            }
            else{
                BlogFavourite::where(['user_id' => auth()->user()->id , 'blog_id' => $data['blog_id']])->delete();
                return response()->json(['action' => 'remove' , 'message' => 'Blog remove form favourite']);
            }
        }
    }
}
