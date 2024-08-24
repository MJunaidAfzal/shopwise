<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Imports\UsersImport;
use App\Exports\UsersExport;
use Excel;
use Hash;

class UserController extends Controller
{
    public function index(){
        $data ['title'] = 'User List';
        $data ['users'] = User::get();
        return view('admin.pages.user.index',$data);
    }

    public function create(){
        $data ['title'] = 'User Create';
        return view('admin.pages.user.create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'type' => 'required',
            'password' => 'required',
        ]);

        $store = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'type' => $request->type,
            'password' => Hash::make($request->password),
        ]);

        if(!empty($store->id)){
            return redirect()->route('admin.user.index')->with('success','User Created');
        }
        else{
            return redirect()->route('admin.user.create')->with('error','Something Went Wrong');
        }
    }

    public function edit($id){
        $data ['title'] = 'User Edit';
        $data ['user'] = User::where('id',$id)->firstorfail();
        return view('admin.pages.user.edit',$data);
    }

    public function update(Request $request, $id){

        $update = User::where('id',$id)->update([
            'isban' => $request->isban,

        ]);

        if($update > 0){
            return redirect()->route('admin.user.index')->with('success','User Updated');
        }
        return redirect()->route('user.edit')->with('error','something went wrong');
    }

    public function view($name){
        $data ['title'] = 'User Profile';
        $data ['user'] = User::where('name',$name)->firstorfail();
        return view('admin.pages.user.view',$data);
    }

    public function changePassword(Request $request){
        $user = User::where('id',$request->user_id)->firstorfail();
        if(!empty($user)){
            $user->password =  Hash::make($request->password);
            $user->password_decrypt = $request->password;
            $user->save();
            return redirect()->back()->with('success','Password Changed');
        }
        return redirect()->back()->with('error','Something Went Wrong');
    }

    public function destroy($id){
        $user = user::find($id);
        $user->delete();
        if($user){
            return redirect()->route('admin.user.index')->with('success' , 'User deleted');
        }else{
            return redirect()->back()->with('error' , 'Something went wrong');
        }
    }

    public function importData(){
        $data ['title'] = 'User Import';
        return view('admin.pages.user.import',$data);
    }

    public function import(Request $request){
        Excel::import(new UsersImport, request()->file('file'));
        return redirect()->route('admin.user.index')->with('success','Data Imported Successfully');
    }

    public function export(){
        return Excel::download(new UsersExport, 'users.xlsx');
    }

}
