<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class StudentCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->gender->id == 1) {
            $d = 'Učenik';
        } else {
            $d = 'Učenica';
        }
        return [
            'ID' => $this->id,
            'name' => Str::ucfirst($this->name),
            'username' => $this->username,
            'gender' => $this->gender->name,
            'email' => $this->email,
            'JMBG' => $this->JMBG,
            'role' => $d,
            'login_count' => $this->login_count,
            'last_login_at' => $this->last_login_at->diffForHumans(),
        ];
    }
}
