<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class CategoryCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ID'            => $this->id,
            'name'          => Str::ucfirst($this->name),
            'description'   => $this->description,
            'show-category' => [
                'link' => route('show-category-api', $this->id)
            ],
        ];
    }
}
