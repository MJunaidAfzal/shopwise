<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function brandsCount($id){
        $products = Product::where('brand_id',$id)->count();
        return $products;
    }
}
