<?php

namespace App\Http\Requests\Book;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'ISBN' => 'required|min:13|max:13',
            'body' => 'required',
            'category_id' => 'required',
            'genre_id' => 'required',
            'author_id' => 'required',
            'page_count' => 'required',
            'letter_id' => 'required',
            'language_id' => 'required',
            'binding_id' => 'required',
            'format_id' => 'required',
            'publisher_id' => 'required',
            'quantity_count' => 'required',
            'rented_count' => 'required',
            'reserved_count' => 'required',
            'year' => 'required',
            'photo' => 'required',
        ];
    }
}
