<?php

namespace App\Http\Resources\Books;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class BookCollection extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ID'        => $this->id,
            'title'     => Str::ucfirst($this->title),
            'cover'     => $this->cover->photo,
            'show-book' => [
                'link' => route('show-book-api', $this->id)
            ],
        ];
    }
}
