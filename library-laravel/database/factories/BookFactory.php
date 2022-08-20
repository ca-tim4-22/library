<?php

namespace Database\Factories;

use App\Models\Binding;
use App\Models\Format;
use App\Models\Language;
use App\Models\Letter;
use App\Models\Publisher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word(),
            'page_count' => $this->faker->numberBetween(1, 999),
            'letter_id' => Letter::all()->random(),
            'language_id' => Language::all()->random(),
            'binding_id' => Binding::all()->random(),
            'format_id' => Format::all()->random(),
            'publisher_id' => Publisher::all()->random(),
            'ISBN' => $this->faker->numberBetween(1, 999),
            'quantity_count' => $this->faker->numberBetween(1, 20),
            'rented_count' => '0',
            'reserved_count' => '0',
            'body' => $this->faker->sentence(30),
            'year' => '2014',
        ];
    }
}
