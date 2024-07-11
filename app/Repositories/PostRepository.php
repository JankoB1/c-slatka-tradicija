<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PostRepository
{
    public function addPost(Request $request)
    {
        try {
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();
                $imagePath = $image->storeAs('public/uploads', $imageName);

                $imageURL = asset('storage/' . str_replace('public/', '', $imagePath));
            } else {
                $imageURL = null;
            }
            return Post::create([
                'title' => $request->input('title'),
                'content' => $request->html_content,
                'image' => $imageURL
            ]);
        } catch (QueryException $exception) {
            Log::error('Can\'t add post: ' . $exception->getMessage());
            return null;
        }

    }
}
