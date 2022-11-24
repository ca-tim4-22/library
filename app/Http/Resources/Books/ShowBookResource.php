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
        foreach ($this->categories as $category) {
            $category = $category;
        }
        foreach ($this->genres as $genre) {
            $genre = $genre;
        }
        foreach ($this->authors as $author) {
            $author = $author;
        }
        if ($this->pdf == 0) {
            $answer = 'Nema pdf';
        } else {
            $answer = 'Ima pdf';
        }
        if ($this->quantity_count > 0) {
            $available = true;
        } else {
            $available = false;
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
            'cover' => $this->cover->photo,
            'pdf' => $answer,
            'categories' => [
                'ID' => $category->category->id,
                'name' => Str::ucfirst($category->category->name),
                'description' => $category->category->description,
            ],
            'genres' => [
                'ID' => $genre->genre->id,
                'name' => Str::ucfirst($genre->genre->name),
                'description' => $genre->genre->description,
            ],
            'authors' => [
                'ID' => $author->author->id,
                'name' => Str::ucfirst($author->author->NameSurname),
                'biography' => $author->author->biography,
            ],
            'available' => $available,
        ];
    }
}
