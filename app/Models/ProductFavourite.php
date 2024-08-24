<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductFavourite extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product(){
        return $this->belongsTo(Product::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
    public static function countfavourite($product_id){
        $countfavourite = ProductFavourite::where(['user_id' => auth()->user()->id , 'product_id' => $product_id])->count();
        return  $countfavourite;
    }
}

