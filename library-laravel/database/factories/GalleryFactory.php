<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $number = 1;
        return [
            'book_id' => $number++,
            // 'photo' => 'https://source.unsplash.com/random',
            'photo' => '1661246210robinzon_kruso.jpg',
            'cover' => 'n',
        ];
    }
}
