<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Models\Post;
use http\Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
   use ApiResponseTrait;

    public function index(){
        $posts = PostResource::collection(Post::get());
        return $this->apiResponse($posts, 'ok', 200);
    }

    public function show($id){
        $post = Post::find($id);
        if($post){
        return $this->apiResponse(new PostResource($post), 'ok', 200);
        }
        return $this->apiResponse(null, 'the post not found', 404);
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        if($validator->fails()){
            return $this->apiResponse(null, $validator->errors(), 400);
        }
        $post = new Post([
            'title'=> $request->input('title'),
            'content'=> $request->input('content'),
        ]);
        $post->save();
        if($post){
            return $this->apiResponse(new PostResource($post), 'the post created successfully', 201);
        }
        return $this->apiResponse(null, 'Error not saved ', 400);
    }

    public function update(Request $request, $id){
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        if($validator->fails()){
            return $this->apiResponse(null, $validator->errors(), 400);
        }

        $post = Post::find($id);
        if(!$post) return $this->apiResponse(null, 'the post not found', 404);
        $post->update([
                'title'=> $request->input('title'),
                'content'=> $request->input('content'),
            ]);
            return $this->apiResponse(new PostResource($post), 'the post updated successfully', 201);

//        try {
//            $post->update([
//                'title'=> $request->input('title'),
//                'content'=> $request->input('content'),
//            ]);
//            return $this->apiResponse(new PostResource($post), 'the post updated successfully', 201);
//        }catch (exception $e){
//            return $this->apiResponse(null, 'faild to update'.$e, 400);
//        }
    }

    public function delete( $id){
        $post = Post::find($id);
        if(!$post) return $this->apiResponse(null, 'the post not found', 404);
        $post->delete();
        return $this->apiResponse(null, 'the post was deleted', 200);
    }
}
