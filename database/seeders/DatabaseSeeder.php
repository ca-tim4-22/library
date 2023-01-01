<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Don't change values!

        \App\Models\User::factory(20)->create();

        // \App\Models\Genre::factory(115)->create();
        // \App\Models\Category::factory(115)->create();

        // \App\Models\Author::factory(15)->create();
        // Book factories
        // \App\Models\Book::factory(40)->create();
        // \App\Models\BookAuthor::factory(15)->create();
        // \App\Models\BookCategory::factory(15)->create();
        // \App\Models\BookGenre::factory(15)->create();
        // \App\Models\Gallery::factory(15)->create();
    }
}
