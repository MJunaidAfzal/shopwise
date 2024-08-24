<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Month;
use Session;
use Str;

class BlogController extends Controller
{
    public function index(){
        $data ['title'] = 'Blog List';
        $data ['blogs'] = Blog::where('user_id',auth()->user()->id)->get();
        return view('user.pages.blog.index',$data);
    }

    public function create(){
        $data ['title'] = 'Blog Create';
        $data ['categories'] = Category::pluck('name' , 'id')->toArray();
        $data ['months'] = Month::pluck('name' , 'id')->toArray();
        return view('user.pages.blog.create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'month_id' => 'required',
            'short_description' => 'required',
            'long_description' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        if($request->file('image')){
            $image = $request->file('image');
            $imageName = 'blog' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/blog/', $imageName);
        }

        $slug = Str::slug($request->title. '-');
        $store = Blog::create([
            'user_id' => $request->user_id,
            'month_id' => $request->month_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $imageName,
            'slug' => $slug,
            'status' => $request->status,
        ]);

        if(!empty($store->id)){
            return redirect()->route('user.blog.index')->with('success','Your blog has been created successfully!');
        }
        else{
            return redirect()->route('user.blog.create')->with('error','Sorry ! Your blog could not be created at this moment.Please try again later');
        }
}

    public function edit($slug){
        $data ['title'] = 'Blog Edit';
        $data ['blog'] = Blog::where('slug',$slug)->first();
        $data ['categories'] = Category::pluck('name' , 'id')->toArray();
        $data ['months'] = Month::pluck('name' , 'id')->toArray();
        return view('user.pages.blog.edit',$data);
    }

    public function update(Request $request, $slug){
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'month_id' => 'required',
            'status' => 'required',
        ]);

        $imageData =   Blog::where('slug',$slug)->first();
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = 'blog' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/blog/', $imageName);
        }
        else{
            $imageName = $imageData->image;
        }

    $update = Blog::where('slug',$slug)->update([
        'user_id' => $request->user_id,
        'month_id' => $request->month_id,
        'category_id' => $request->category_id,
        'title' => $request->title,
        'short_description' => $request->short_description,
        'long_description' => $request->long_description,
        'image' => $imageName,
        'slug' => $slug,
        'status' => $request->status,

    ]);
    if($update > 0){
        return redirect()->route('user.blog.index')->with('success','Blog Updated');
    }
    return redirect()->route('user.blog.edit')->with('error','something went wrong');
    }


    public function destroy($id){
        $blog = Blog::find($id);
        $blog->delete();
        if($blog){
            return redirect()->route('user.blog.index')->with('success' , 'Blog deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }

}
