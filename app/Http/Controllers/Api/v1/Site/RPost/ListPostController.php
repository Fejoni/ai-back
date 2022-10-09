<?php

namespace App\Http\Controllers\Api\v1\Site\RPost;

use App\Http\Controllers\Controller;
use App\Http\Resources\Site\Post\ListPostResource;
use App\Models\Site\Post\Post;
use Illuminate\Http\Request;

class ListPostController extends Controller
{
    public function list()
    {
        return ListPostResource::collection(Post::with(['user', 'subject'])->get());
    }
}
