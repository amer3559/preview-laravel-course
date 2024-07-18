<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class PostController extends Controller
{
    public function getIndex()
    {
        $post = new Post();
        $posts = $post->getPosts();
        return view('blog.index', ['posts' => $posts]);
    }

    public function getAdminIndex()
    {
        $post = new Post();
        $posts = $post->getPosts();
        return view('admin.index', ['posts' => $posts]);
    }

    public function getPost($id)
    {
        $post = new Post();
        $post = $post->getPost($id);
        return view('blog.post', ['post' => $post]);
    }

    public function getAdminCreate()
    {
        return view('admin.create');
    }

    public function getAdminEdit($id)
    {
        $post = new Post();
        $post = $post->getPost($id);
        return view('admin.edit', ['post' => $post, 'postId' => $id]);
    }

    public function postAdminCreate( Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $post = new Post();
        $post->addPost( $request);
        return redirect()->route('admin.index')->with('info', 'Post created, Title is: ' . $request->input('title'));
    }

    public function postAdminUpdate( Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);

        $post = new Post();
        $post->editPost($request->id, $request);
        return redirect()->route('admin.index')->with('info', 'Post edited, new Title is: ' . $request->input('title'));
    }

}
