<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserCollection extends JsonResource
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
            'username' => $this->username,
            'gender' => $this->gender->name,
            'email' => $this->email,
            'JMBG' => $this->JMBG,
            'role' => $this->type->name,
            'login_count' => $this->login_count,
            'last_login_at' => $this->last_login_at->diffForHumans(),
        ];
    }
}
