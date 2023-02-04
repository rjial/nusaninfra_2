<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'user_id' => $this->user_id,
            'isbn' => $this->isbn,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'author' => $this->author,
            'published' => $this->published,
            'publisher' => $this->publisher,
            'pages' => $this->pages,
            'website' => $this->website,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
