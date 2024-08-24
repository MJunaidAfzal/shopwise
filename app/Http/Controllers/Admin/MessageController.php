<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;

class MessageController extends Controller
{
    public function message(){
        $data ['title'] = 'Contacts';
        $data ['contacts'] = Message::get();
        return view('admin.pages.message.index',$data);
    }

    public function destroy($id){
        $contact = Message::find($id);
        $contact->delete();
        if($contact){
            return redirect()->route('admin.contact.index')->with('success' , 'Contact deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }
}
