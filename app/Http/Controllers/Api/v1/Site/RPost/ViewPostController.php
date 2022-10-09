<?php

namespace App\Http\Controllers\Api\v1\Site\RPost;

use App\Http\Controllers\Controller;
use App\Http\Resources\Site\Post\ViewPostResource;
use App\Models\Site\Post\Post;
use Illuminate\Http\Request;

class ViewPostController extends Controller
{
    public function view($id)
    {
        return ViewPostResource::collection(Post::where('id', $id)->with(['user', 'subject'])->get());
    }
}
