<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostRepository
{
    public function addPost(Request $request)
    {
        try {
            return Post::create([
                'title' => $request->input('title'),
                'content' => $request->html_content,
            ]);
        } catch (QueryException $exception) {
            Log::error('Can\'t add post: ' . $exception->getMessage());
            return null;
        }

    }
}
