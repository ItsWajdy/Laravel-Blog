<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Tag as TagResource;
use App\Http\Resources\Category as CategoryResource;
use App\Category as Category;

class Post extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'slug' => $this->slug,
            'category' => new CategoryResource(Category::find($this->category_id)),
            'tags' => TagResource::collection($this->tags),
        ];
    }
}
