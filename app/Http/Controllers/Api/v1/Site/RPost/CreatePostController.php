<?php

namespace App\Http\Controllers\Api\v1\Site\RPost;

use App\Http\Controllers\Controller;
use App\Http\Requests\Site\Post\CreatePostRequest;
use App\Models\Site\Post\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class CreatePostController extends Controller
{
    public function create(CreatePostRequest $request): Response|Application|ResponseFactory
    {
        Post::create($request->validated());

        return response(null, ResponseAlias::HTTP_NO_CONTENT);
    }
}
