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
        \App\Models\User::factory(20)->create();
        // \App\Models\Genre::factory(500)->create();
        \App\Models\Author::factory(5)->create();
        // Book factories
        \App\Models\Book::factory(5)->create();
        \App\Models\BookAuthor::factory(5)->create();
        \App\Models\BookCategory::factory(5)->create();
        \App\Models\BookGenre::factory(5)->create();
        \App\Models\Gallery::factory(5)->create();
        
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
