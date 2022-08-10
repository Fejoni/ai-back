<?php

namespace App\Http\Resources\Site\Post;

use App\Http\Resources\Admin\Post\SubjectResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ListPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'subject' => SubjectResource::make($this->subject), // make - Т.к 1 объект
            'user' => $this->user->name,
        ];
    }
}
