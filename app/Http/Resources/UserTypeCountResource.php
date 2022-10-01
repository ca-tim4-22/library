<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class UserTypeCountResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $students = User::where('user_type_id', 1)->count();
        $librarians = User::where('user_type_id', 2)->count();
        $administrators = User::where('user_type_id', 3)->count();
        return [
            'students' => $students,
            'librarians' => $librarians,
            'administrators' => $administrators,
        ];
    }
}
