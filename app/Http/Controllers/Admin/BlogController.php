<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index(){
        $data ['title'] = 'Blog List';
        $data ['blogs'] = Blog::orderBy('created_at', 'desc')->get();
        return view ('admin.pages.blog.index',$data);
    }

    public function destroy($id){
        $blog = Blog::find($id);
        $blog->delete();
        if($blog){
            return redirect()->route('admin.blog.index')->with('success' , 'Blog deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }

    public function search(){
        $data ['title'] = 'Search Blog';
        $data ['blogs'] = Blog::get();
        return view('admin.pages.blog.search',$data);
    }

    public function blogSearch($id){
        $data['blog'] = Blog::where('id',$id)->firstorfail();
        $view = view('admin.pages.blog.blogSearch',$data);
        return response(['success' => true, 'data' => $view->render()]);
    }
}
