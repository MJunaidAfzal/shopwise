<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class SettingController extends Controller
{
    public function edit(){
        $data ['title'] = 'Setting';
        $data ['setting']= \App\Models\Setting::where('id',1)->first();  //select * from setting limit 1
        return view('admin.pages.setting.edit',$data);
    }

    public function store(Request $request){
        if($request->file('header')){
            $header = $request->file('header');
            $headerName = 'header' . '-' . time() . '.' . $header->getClientOriginalExtension();
            $header->move('upload/setting/', $headerName);
        }

        if($request->file('footer')){
            $footer = $request->file('footer');
            $footerName = 'footer' . '-' . time() . '.' . $footer->getClientOriginalExtension();
            $footer->move('upload/setting/', $footerName);
        }

        if($request->file('favico')){
            $favico = $request->file('favico');
            $favicoName = 'favico' . '-' . time() . '.' . $favico->getClientOriginalExtension();
            $favico->move('upload/setting/', $favicoName);
        }

        $store = Setting::create([
            "facebook" => $request->facebook,
            "twitter" => $request->twitter,
            "instagram" => $request->instagram,
            "youtube" => $request->youtube,
            "google" => $request->google,
            "header" => $headerName ?? '',
            "footer" => $footerName ?? '',
            "favico" => $favicoName ?? '',
            "phone" => $request->phone,
            "email" => $request->email,
            "address" => $request->address,
        ]);

        if($store->id){
            return redirect()->route('admin.setting.edit')->with('success','Setting Updated');
        }
        return redirect()->route('admin.setting.edit')->with('error','something went wrong');
    }

    public function update( Request $request) {
        $setting = Setting::find(1);

        if(!$setting){
            return redirect()->route('admin.setting.edit')->with('error', 'Setting record not found');
        }

        if($request->file('header')){
            $header = $request->file('header');
            $headerName = 'header' . '-' . time() . '.' . $header->getClientOriginalExtension();
            $header->move('upload/setting/', $headerName);
            $setting->header = $headerName;
        }

        if($request->file('footer')){
            $footer = $request->file('footer');
            $footerName = 'footer' . '-' . time() . '.' . $footer->getClientOriginalExtension();
            $footer->move('upload/setting/', $footerName);
            $setting->footer = $footerName;
        }

        if($request->file('favico')){
            $favico = $request->file('favico');
            $favicoName = 'favico' . '-' . time() . '.' . $favico->getClientOriginalExtension();
            $favico->move('upload/setting/', $favicoName);
            $setting->favico = $favicoName;
        }


        $setting->facebook = $request->facebook;
        $setting->twitter = $request->twitter;
        $setting->instagram = $request->instagram;
        $setting->youtube = $request->youtube;
        $setting->google = $request->google;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->address = $request->address;

        $update = $setting->save();

        if($update){
            return redirect()->route('admin.setting.edit')->with('success','Setting Updated');
        }
        return redirect()->route('admin.setting.edit')->with('error','something went wrong');

    }


}
