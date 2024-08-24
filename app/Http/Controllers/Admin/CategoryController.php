<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Str;

class CategoryController extends Controller
{

    public function index(){
        $data ['title']  = 'Category List';
        $data ['categories'] = Category::get();
        return view('admin.pages.category.index',$data);
    }

    public function create(){
        $data ['title'] = 'Category Create';
        return view('admin.pages.category.create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'icon' => 'required',
            'status' => 'required',
        ]);

        if($request->file('icon')){
            $image = $request->file('icon');
            $imageName = 'category' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/category/', $imageName);
        }

        $slug = Str::slug($request->name. '-');
        $store = Category::create([
            'name' => $request->name,
            'icon' => $imageName,
            'slug' => $slug,
            'status' => $request->status,
        ]);

        if(!empty($store->id)){
            return redirect()->route('admin.category.index')->with('success','Category Added');
        }
        else{
            return redirect()->route('admin.category.create')->with('error','Something Went Wrong');
        }
    }

    public function edit($slug){
        $data ['title'] = 'Category Edit';
        $data ['category'] = Category::where('slug',$slug)->first();
        return view('admin.pages.category.edit',$data);
    }

    public function update(Request $request, $slug){
        $request->validate([
            'name' => 'required|max:191',
            'status' => 'required',
        ]);

        $imageData =   Category::where('slug',$slug)->first();
        if($request->file('icon')){
            $image = $request->file('icon');
            $imageName = 'category' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/category/', $imageName);
        }
        else{
            $imageName = $imageData->icon;
        }

    $update = Category::where('slug',$slug)->update([
        'name' => $request->name,
        'icon' => $imageName,
        'status' => $request->status,

    ]);
    if($update > 0){
        return redirect()->route('admin.category.index')->with('success','Category Updated');
    }
    return redirect()->route('admin.category.edit')->with('error','something went wrong');
    }

    public function destroy($id){
        $category = Category::find($id);
        $category->delete();
        if($category){
            return redirect()->route('admin.category.index')->with('success' , 'Category deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }
}

