<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;

class BannerController extends Controller
{
    public function index(){
        $data ['title'] = 'Banner List';
        $data ['banners'] = Banner::get();
        return view('admin.pages.banner.index',$data);
    }

    public function create(){
        $data ['title'] = 'Banner Create';
        return view('admin.pages.banner.create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'link' => 'required',
            'button_name' => 'required',
            'detail' => 'required',
            'status' => 'required',
        ]);

        if($request->file('image')){
            $image = $request->file('image');
            $imageName = 'banner' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/banner/', $imageName);
        }

        $store = Banner::create([
            'name' => $request->name,
            'button_name' => $request->button_name,
            'link' => $request->link,
            'detail' => $request->detail,
            'image' => $imageName,
            'status' => $request->status,
        ]);

        if(!empty($store->id)){
            return redirect()->route('admin.banner.index')->with('success','Banner Added');
        }
        else{
            return redirect()->route('admin.banner.create')->with('error','Something Went Wrong');
        }
    }

    public function edit($id){
        $data ['title'] = 'Banner Edit';
        $data ['banner'] = Banner::where('id',$id)->first();
        return view('admin.pages.banner.edit',$data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:191',
            'status' => 'required',
        ]);

        $imageData =   Banner::where('id',$id)->first();
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = 'banner' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/banner/', $imageName);
        }
        else{
            $imageName = $imageData->image;
        }

    $update = Banner::where('id',$id)->update([
        'name' => $request->name,
        'link' => $request->link,
        'button_name' => $request->button_name,
        'detail' => $request->detail,
        'image' => $imageName,
        'status' => $request->status,

    ]);
    if($update > 0){
        return redirect()->route('admin.banner.index')->with('success','Banner Updated');
    }
    return redirect()->route('admin.banner.edit')->with('error','something went wrong');
    }


    public function destroy($id){
        $banner = Banner::find($id);
        $banner->delete();
        if($banner){
            return redirect()->route('admin.banner.index')->with('success' , 'Banner deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }

}
