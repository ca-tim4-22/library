<?php

namespace App\Http\Resources\Count;

use App\Models\Author;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorCountResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $authors = Author::count();
        return [
            'authors' => $authors,
        ];
    }
}
