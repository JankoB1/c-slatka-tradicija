<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{

    protected PostService $postService;

    public function __construct() {
        $this->postService = new PostService();
    }

    public function showAddPost() {
        return view('auth.add-post');
    }

    public function addPost(Request $request) {
        $post = $this->postService->addPost($request);
        return response()->json($post);
    }

    public function showSinglePost($id) {
        $post  = Post::find($id);
        return view('posts.single-post', compact('post'));
    }

    public function showPosts() {
        $posts = Post::orderBy('created_at', 'desc')->paginate(21);
        return view('posts.posts', compact('posts'));
    }

}
