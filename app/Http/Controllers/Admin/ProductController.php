<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Size;
use App\Models\Gallery;
use Str;
use File;

class ProductController extends Controller
{
    public function index(){
        $data ['title'] = 'Product List';
        $data ['products'] = Product::orderBy('id','desc')->get();
        return view ('admin.pages.product.index',$data);
    }

    public function create(){
        $data ['title'] = 'Product Create';
        $data ['categories'] = Category::pluck('name','id')->toArray();
        $data ['brands'] = Brand::pluck('name','id')->toArray();
        $data ['sizes'] = Size::pluck('size','id')->toArray();
        return view('admin.pages.product.create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required|max:191|min:1',
            'price' => 'required|max:11|min:1',
            'del_price' => 'required|max:11|min:1',
            'discount' => 'required|max:191|min:1',
            'detail' => 'required|max:8000|min:1',
            'color' => 'required|max:191|min:1',
            'size_id' => 'required|max:191|min:1',
            'category_id' => 'required|max:191|min:1',
            'brand_id' => 'required|max:191|min:1',
            'sku' => 'required|max:191|min:1',
            'description' => 'required',
            'capacity' => 'required|max:191|min:1',
            'material' => 'required|max:191|min:1',
            'water_resistant' => 'required|max:191|min:1',
            'status' => 'required',
            'images' => 'required',
        ]);

        $slug = Str::slug($request->title, '-');
        $store = Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'del_price' => $request->del_price,
            'discount' => $request->discount,
            'detail' => $request->detail,
            'color' => $request->color,
            'size_id' => $request->size_id,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'sku' => $request->sku,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'material' => $request->material,
            'water_resistant' => $request->water_resistant,
            'status' => $request->status,
            'slug' => $slug,
        ]);

        if($request->has('images')){
            foreach($request->file('images') as $index=>$image){
                $imageName = 'product' . '-' . time() .'-'.rand(1000,100). '.' . $image->getClientOriginalExtension();
                $image->move(public_path('upload/product_images'),$imageName);
                Gallery::create([
                    'product_id' => $store->id,
                    'image' => $imageName,
                    'is_main' => $index==1 ? 1 : 0,
                ]);
            }
        }
        if(!empty($store->id)){
            return redirect()->route('admin.product.index')->with('success','Product Added');
        }
        else{
            return redirect()->route('admin.product.create')->with('error','Something Went Wrong');
        }
    }

    public function edit($slug){
        $data ['title'] = 'Edit Product';
        $data ['product'] = Product::where('slug',$slug)->firstorfail();
        $data ['categories'] = Category::pluck('name','id')->toArray();
        $data ['brands'] = Brand::pluck('name','id')->toArray();
        $data ['sizes'] = Size::pluck('size','id')->toArray();
        $data ['galleries'] = Gallery::where('product_id', $data['product']->id)->get();
        return view('admin.pages.product.edit',$data);
    }

    public function update(Request $request,$slug){
    $product = Product::where('slug',$slug)->firstorfail();
    $update = Str::slug($request->title , '-');
        $update = Product::where('slug',$slug)->update([
            'title' => $request->title,
            'price' => $request->price,
            'del_price' => $request->del_price,
            'discount' => $request->discount,
            'detail' => $request->detail,
            'color' => $request->color,
            'size_id' => $request->size_id,
            'category_id' => $request->category_id,
            'brand_id' => $request->brand_id,
            'sku' => $request->sku,
            'description' => $request->description,
            'capacity' => $request->capacity,
            'material' => $request->material,
            'water_resistant' => $request->water_resistant,
            'status' => $request->status,
            'slug' => $slug,
        ]);

        if($request->has('images')){
            foreach($request->file('images') as $index=>$image){
                $imageName = 'product' . '-' . time() .'-'.rand(1000,100). '.' . $image->getClientOriginalExtension();;
                $image->move(public_path('upload/product_images'),$imageName);
                Gallery::create([
                    'product_id' => $product->id,
                    'image' => $imageName,
                ]);
            }
        }
        //Update Is Main
        Gallery::where('product_id', $product->id)->update(['is_main' => 0]);
        Gallery::where('id', $request->is_main)->update(['is_main' => 1]);
    if($update > 0){
        return redirect()->route('admin.product.index')->with('success','Product Updated');
    }
    return redirect()->route('admin.product.edit')->with('error','something went wrong');
    }

    public function remove_gallery($id){
        Gallery::find($id)->delete();
        if(!empty($id)){
            return redirect()->back()->with('success' , 'Image deleted');
        }else{
            return redirect()->back()->with('error' , '404 image not found');
        }
    }
    public function destroy($id){
        $product = Product::find($id);
        $path = 'upload/product_images/'.$product->image;
        if(File::exists($path)){
            File::delete($path);
        }
        $product->delete();
        if($product){
            return redirect()->route('admin.product.index')->with('success' , 'Product deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }
}
