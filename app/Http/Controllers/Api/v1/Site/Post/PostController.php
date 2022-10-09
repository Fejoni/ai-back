<?php

namespace App\Http\Controllers\Api\v1\Site\Post;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Post\CreatePostRequest;
use App\Http\Resources\Site\Post\ListPostResource;
use App\Services\Post\PostService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    private PostService $postService;
    
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    public function create(CreatePostRequest $request)
    {
        $this->postService->create($request->validated());
    }

    public function list()
    {
        return $this->postService->list();
    }

    public function view($id)
    {
        $this->postService->view($id);
    }
}
