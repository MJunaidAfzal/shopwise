<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function categoryCount($id){
        $blogs = Blog::where('category_id',$id)->count();
        return $blogs;
    }

    public function ProductsCount($id){
        $products = Product::where('category_id',$id)->count();
        return $products;
}
}
