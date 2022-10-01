<?php

namespace App\Http\Resources;

use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Resources\Json\JsonResource;

class UserTypeCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'ID' => $this->id,
            'name' => $this->name,
        ];
    }
}
