<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Month extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function monthCount($id){
        $blogs  = Blog::where('month_id',$id)->count();
        return $blogs;
}
}
