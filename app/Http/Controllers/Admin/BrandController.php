<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Str;

class BrandController extends Controller
{
    public function index(){
        $data ['title'] = 'Brands List';
        $data ['brands'] = Brand::latest()->get();
        return  view('admin.pages.brand.index',$data);
    }

    public function create(){
        $data ['title'] = 'Brand Create';
        return view('admin.pages.brand.create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);

        if($request->file('image')){
            $image = $request->file('image');
            $imageName = 'brand' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/brand/', $imageName);
        }

        $slug = Str::slug($request->name. '-');
        $store = Brand::create([
            'name' => $request->name,
            'image' => $imageName,
            'slug' => $slug,
            'status' => $request->status,
        ]);

        if(!empty($store->id)){
            return redirect()->route('admin.brand.index')->with('success','Brand Added');
        }
        else{
            return redirect()->route('admin.brand.create')->with('error','Something Went Wrong');
        }
    }

    public function edit($slug){
        $data ['title'] = 'Brand Edit';
        $data ['brand'] = Brand::where('slug',$slug)->first();
        return view('admin.pages.brand.edit',$data);
    }

    public function update(Request $request, $slug){
        $request->validate([
            'name' => 'required|max:191',
            'status' => 'required',
        ]);

        $imageData =   Brand::where('slug',$slug)->first();
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = 'brand' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/brand/', $imageName);
        }
        else{
            $imageName = $imageData->image;
        }

    $update = Brand::where('slug',$slug)->update([
        'name' => $request->name,
        'image' => $imageName,
        'status' => $request->status,

    ]);
    if($update > 0){
        return redirect()->route('admin.brand.index')->with('success','Brand Updated');
    }
    return redirect()->route('admin.brand.edit')->with('error','something went wrong');
    }

    public function destroy($id){
        $brand = Brand::find($id);
        $brand->delete();
        if($brand){
            return redirect()->route('admin.brand.index')->with('success' , 'Brand deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }
}
