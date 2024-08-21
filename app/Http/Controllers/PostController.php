<?php

namespace App\Http\Controllers;

use App\DataTables\PostsDataTable;
use App\DataTables\UsersDataTable;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

    public function testEmail() {
        $data = [];
        Mail::send('test-email', $data, function($message) use ($data)
        {
            $message->from(env('MAIL_FROM_ADDRESS', 'test@c-slatkatradicija.com'));
            $message->to("janko.tbbt@gmail.com", "Janko");
            $message->subject('Test email');
        });
    }

    public function showPostsList(PostsDataTable $dataTable) {
        if(Auth::user() == null || Auth::user()->admin == 0) {
            return redirect()->route('show-homepage');
        }
        return $dataTable->render('auth.admin.posts-list');
    }

    public function deletePost($id) {
        $this->postService->deletePost($id);
    }

    public function showEditPost($id) {
        $post = Post::find($id);
        return view('auth.edit-post', compact('post'));
    }

    public function editPost(Request $request, $id) {
        $post = $this->postService->editPost($request, $id);
        return response()->json($post);
    }

}
