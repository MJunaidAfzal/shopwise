<?php

use App\Models\Page;
use App\Models\Setting;
use App\Models\Gallery;
use App\Models\Category;
use App\Models\Product;



function pages(){
    $pages = Page::where('status',1)->get();
    return $pages;
}

function settings(){
    $settings = Setting::where('id',1)->first();
    return $settings;
}

function mainImage($product_id){
    $image = Gallery::where('product_id',$product_id)->where('is_main',1)->first();
    if(!empty($image)){
        return $image->image;
    }
    else{
        return null;
    }
}

function categories(){
    $categories = Category::where('status',1)->get();
    return $categories;
}

function search(){
    $data = new Product();

    if(isset($request->title)){
        $data = $data->where('title','LIKE','%'.$request->title.'%');
    }

    return $data;
}




