<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    public function getPosts(){
        return Post::get();
    }
    public function getPost($id){
        return Post::findOrFail($id);
    }
    public function addPost($data){
        $post = new Post();
        $post->title = $data->title;
        $post->content = $data->content;
       $post->save();
    }
    public function editPost($id, $data){
        return Post::where('id',$id)->update(
            [
                'title' => $data->title,
                'content' => $data->content,
            ]
        );
    }
    public function createDummyData(){}


}
