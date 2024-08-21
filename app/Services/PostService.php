<?php

namespace App\Services;

use App\Repositories\PostRepository;

class PostService
{

    protected PostRepository $postRepository;

    public function __construct() {
        $this->postRepository = new PostRepository();
    }

    public function addPost($request) {
        return $this->postRepository->addPost($request);
    }

    public function deletePost($id) {
        $this->postRepository->deletePost($id);
    }

    public function editPost($request, $id) {
        return $this->postRepository->editPost($request, $id);
    }

}
