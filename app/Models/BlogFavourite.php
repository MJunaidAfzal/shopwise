<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogFavourite extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function blog(){
        return $this->belongsTo(Blog::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public static function countfavourite($blog_id){
        $countfavourite = BlogFavourite::where(['user_id' => auth()->user()->id , 'blog_id' => $blog_id])->count();
        return  $countfavourite;
    }
}
