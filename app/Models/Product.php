<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function size(){
        return $this->belongsTo(Size::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function review(){
        return $this->belongsTo(Review::class);
    }

  
}
