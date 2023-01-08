<?php

namespace App\Http\Requests\Books;

use Illuminate\Foundation\Http\FormRequest;

class BookStoreRequest extends FormRequest
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
            'title' => 'required|min:2|max:255',
            'page_count' => 'required|numeric|min:0|max:2000|not_in:0',
            'ISBN' => 'required|min:13|max:13|unique:books',
            'quantity_count' => 'required|min:0|not_in:0',
            'body' => 'required|min:2|max:1000',
            'year' => 'required|min:0|not_in:0',
            // These go with except()
            // 'category_id' => 'required',
            // 'genre_id' => 'required',
            // 'author_id' => 'required',
            'publisher_id' => 'required',
            'language_id' => 'required',
            'letter_id' => 'required',
            'binding_id' => 'required',
            'format_id' => 'required',
        ];
    }
}
