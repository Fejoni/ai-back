<?php

namespace App\Http\Resources\Site\Post;

use App\Http\Resources\Admin\Post\SubjectResource;
use App\Http\Resources\Site\User\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ViewPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'created_at' => $this->created_at,
            'subject' => SubjectResource::make($this->subject),
            'user' => UserResource::make($this->user)
        ];
    }
}
