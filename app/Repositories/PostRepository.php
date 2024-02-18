<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Http\Request;

class PostRepository
{
    public function addPost(Request $request)
    {
        return Post::create([
            'title' => $request->title,
            'content' => $request->html_content,
        ]);
    }
}
