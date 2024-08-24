<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class ContactController extends Controller
{
    public function contact(){
        $data ['title'] = 'Contact us';
        // $data ['pages'] = Page::get();
        return view('web.pages.contact',$data);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

    $store = Message::create([
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->phone,
        'subject' => $request->subject,
        'message' => $request->message,
    ]);

    if(!empty($store->id)){
        return redirect()->back()->with('success','Contact Info Added');
    }
    else{
        return redirect()->back()->with('error','Something Went Wrong');
    }

  }
  
}

