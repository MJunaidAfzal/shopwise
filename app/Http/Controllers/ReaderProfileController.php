<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ReaderProfileController extends Controller
{

    public function profile(){
        $data ['title'] = 'Profile Edit';
        $data ['profile'] = User::where('id',auth()->user()->id)->firstorfail();
        return view('reader.pages.profile.edit',$data);
    }

    public function view(){
        $data ['title'] = 'Profile View';
        return view('reader.pages.profile.view',$data);
    }

    public function update(Request $request,$id){

        $imageData = User::where('id',auth()->user()->id)->first();
        if($request->file('image')){
            $image = $request->file('image');
            $imageName = 'image' . '-' . time() . '.' . $image->getClientOriginalExtension();
            $image->move('upload/image/', $imageName);
        }
        else{
            $imageName =  $imageData->image;
    }

    $update = User::where('id',auth()->user()->id)->update([
        'name' => $request->name,
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'dob' => $request->dob,
        'phone' => $request->phone,
        'address' => $request->address,
        'address2' => $request->address2,
        'country' => $request->country,
        'state' => $request->state,
        'city' => $request->city,
        'pincode' => $request->pincode,
        'image' => $imageName,
    ]);

    if($update > 0){
        return redirect()->back()->with('success' , 'User Profile Updated');
    }
    else{
        return redirect()->back()->with('error' , 'Something Went Wrong');
    }
}
}

