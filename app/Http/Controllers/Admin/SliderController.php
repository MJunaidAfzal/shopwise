<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index(){
        $data ['title'] = 'Slider List';
        $data ['sliders'] = Slider::all();
        return view('admin.pages.slider.index',$data);
    }

    public function create(){
        $data ['title'] = 'Slider Create';
        return view('admin.pages.slider.create',$data);
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
            $imageName = 'slider' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/slider/', $imageName);
        }

        $store = Slider::create([
            'name' => $request->name,
            'button_name' => $request->button_name,
            'link' => $request->link,
            'detail' => $request->detail,
            'image' => $imageName,
            'status' => $request->status,
        ]);

        if(!empty($store->id)){
            return redirect()->route('admin.slider.index')->with('success','Slider Added');
        }
        else{
            return redirect()->route('admin.slider.create')->with('error','Something Went Wrong');
        }
    }

    public function edit($id){
        $data ['title'] = 'Slider Edit';
        $data ['slider'] = Slider::where('id',$id)->first();
        return view('admin.pages.slider.edit',$data);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|max:191',
            'status' => 'required',
        ]);

        $imageData =   Slider::where('id',$id)->first();
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = 'slider' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/slider/', $imageName);
        }
        else{
            $imageName = $imageData->image;
        }

    $update = Slider::where('id',$id)->update([
        'name' => $request->name,
        'link' => $request->link,
        'button_name' => $request->button_name,
        'detail' => $request->detail,
        'image' => $imageName,
        'status' => $request->status,

    ]);
    if($update > 0){
        return redirect()->route('admin.slider.index')->with('success','Slider Updated');
    }
    return redirect()->route('admin.slider.edit')->with('error','something went wrong');
    }

    public function destroy($id){
        $slider = Slider::find($id);
        $slider->delete();
        if($slider){
            return redirect()->route('admin.slider.index')->with('success' , 'Slider deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }

}
