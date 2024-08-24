<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request) {
        if(auth()->check()){
            $request->validate([
                'comment' => 'required',
                'user_id' => 'required',
                'blog_id' => 'required',
            ]);

        $store = Comment::create([
            'comment' => $request->comment,
            'reader_id' => auth()->user()->id,
            'user_id' => $request->user_id,
            'blog_id' => $request->blog_id,
        ]);
        if(!empty($store->id)){
            return redirect()->back()->with('success','Your Comment Added');
        }
        return redirect()->back()->with('error','Something Went Wrong');
    }
    else{
        return redirect()->route('login')->with('error','Please login first');

    }


    }


    public function destroy($id){
        $comment = Comment::find($id);
        $comment->delete();
        if($comment){
            return redirect()->back()->with('success' , 'Comment deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }

}
