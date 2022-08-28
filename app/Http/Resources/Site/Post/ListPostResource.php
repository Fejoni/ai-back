<?php

namespace App\Http\Resources\Site\Post;

use App\Http\Resources\Admin\Post\SubjectResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

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
            'title' => Str::limit($this->title, 90),
            'created_at_year' => Str::beforeLast(\str($this->created_at), ' '),
            'created_at_time' => Str::after(\str($this->created_at), ' '),
            'subject' => SubjectResource::make($this->subject), // make - Т.к 1 объект
            'user' => $this->user->name,
        ];
    }
}
