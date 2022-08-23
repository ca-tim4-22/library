<?php

namespace Database\Factories;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookAuthor>
 */
class BookAuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $num1 = 1;
        static $num2 = 1;
        return [
            'book_id' => $num1++,
            'author_id' => $num2++,
        ];
    }
}
