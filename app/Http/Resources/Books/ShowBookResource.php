<?php

namespace App\Http\Resources\Books;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class ShowBookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        if ($this->pdf == 0) {
            $answer = 'Nema pdf';
        } else {
            $answer = 'Ima pdf';
        }
        return [
            'ID' => $this->id,
            'title' => Str::ucfirst($this->title),
            'body' => $this->body,
            'ISBN' => $this->ISBN,
            'letter' => $this->letter->name,
            'language' => $this->language->name,
            'binding' => $this->binding->name,
            'format' => $this->format->name,
            'publisher' => $this->publisher->name,
            'year' => $this->year,
            'quantity_count' => $this->quantity_count,
            'rented_count' => $this->rented_count,
            'reserved_count' => $this->reserved_count,
            'page_count' => $this->page_count,
            'pdf' => $answer,
        ];
    }
}
