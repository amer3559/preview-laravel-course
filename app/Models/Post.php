<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'photo'];

//    public function likes(){
//        return $this->hasMany(Like::class, 'post_id');
//    }
//
//    public function tags(){
//        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
//    }
//
//    public function user()
//    {
////        return $this->belongsTo(User::class, 'user_id');
//        return $this->belongsTo(User::class);
//    }
//
//    public function setTitleAttribute($value) {
//        $this->attributes['title'] = strtolower($value);
//    }
//
//    public function getTitleAttribute($value) {
//        return strtoupper($value);
//    }

    public function  getPhotoAttribute($val){
        return ($val !== null) ? asset('images/posts/' . $val) : "";
    }


}
