<?php

namespace App\Services\Post;

use App\Http\Resources\Site\Post\ListPostResource;
use App\Http\Resources\Site\Post\ViewPostResource;
use App\Models\Site\Post\Post;

class PostService
{
    public function create($data)
    {
        Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'subject_id' => $data['subject_id'],
            'user_id' => $data['user_id'],
        ]);
    }

    public function list()
    {
        return ListPostResource::collection(Post::with(['user', 'subject'])->get());
    }

    public function view($id)
    {
        return ViewPostResource::collection(Post::where('id', $id)->with(['user', 'subject'])->get());
    }
}