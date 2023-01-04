<?php

namespace App\Http\Resources\Count;

use App\Models\GlobalVariable;
use Illuminate\Http\Resources\Json\JsonResource;

class GlobalVariableCountResource extends JsonResource
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
        $variables = GlobalVariable::count();
        return [
            'variables' => $variables,
        ];
    }
}
