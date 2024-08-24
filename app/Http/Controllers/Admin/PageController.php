<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Str;

class PageController extends Controller
{
    public function index(){
        $data ['title'] = 'Page List';
        $data ['pages'] = Page::get();
        return view('admin.pages.page.index',$data);
    }

    public function create(){
        $data ['title'] = 'Page Create';
        return view('admin.pages.page.create',$data);
    }

    public function store(Request $request){
        $request->validate([
            'title' =>  "required|max:191",
            'description' =>  "required|",
            'status' =>  "required",
        ]);

    $slug = Str::slug($request->title. '-');
    $store = Page::create([
        'title' => $request->title,
        'status' => $request->status,
        'description' => $request->description,
        'slug' => $slug,
    ]);

    if(!empty($store->id)){
        return redirect()->route('admin.page.index')->with('success','Page Added');
    }
    else{
        return redirect()->route('admin.page.create')->with('error','Something Went Wrong');
    }
    }

    public function edit($slug){
        $data ['title'] = 'Page Edit';
        $data ['page']= Page::where('slug',$slug)->firstOrFail();
        return view('admin.pages.page.edit',$data);
    }

    public function update(Request $request , $slug) {
        $request->validate([
            'title' =>  "required|max:191",
            'description' =>  "required|",
            'status' =>  "required",
        ]);

        $update = Page::where('slug',$slug)->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,

        ]);
        if($update > 0){
            return redirect()->route('admin.page.index')->with('success','Page Updated');
        }
        return redirect()->route('admin.page.edit')->with('error','something went wrong');
        }
        public function destroy($id){
            $page = Page::find($id);
            $page->delete();
            if($page){
                return redirect()->route('admin.page.index')->with('success' , 'Page deleted');
            }else{
                return redirect()->back()->with('error' , 'Something went wrong');
            }
        }
}
