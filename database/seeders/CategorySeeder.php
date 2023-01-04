<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            ['name'        => 'Pravo',
             'icon'        => '/img/default_images_while_migrations/categories/law.png',
             'description' => 'Pravo je ukupnost pravnih pravila, načela i instituta kojima se uređuju odnosi u određenoj društvenoj zajednici (pravo u objektivnom smislu).',
             'default'     => 'true'
            ],
            ['name'        => 'Nauka, priroda i matematika',
             'icon'        => '/img/default_images_while_migrations/categories/science.png',
             'description' => 'Matematika je nauka koja izučava aksiomatski definisane apstraktne strukture koristeći matematičku logiku.',
             'default'     => 'true'
            ],
            ['name'        => 'Školske knjige',
             'icon'        => '/img/default_images_while_migrations/categories/school_books.png',
             'description' => 'Sve knjige koje su predviđene za obrazovni program.',
             'default'     => 'true'
            ],
            ['name'        => 'Istorijske knjige',
             'icon'        => '/img/default_images_while_migrations/categories/history.png',
             'description' => 'Sve knjige koje daju neke informacije ili dokaze o istoriji iz raznih oblasti.',
             'default'     => 'true'
            ],
            ['name'        => 'Dječije knjige',
             'icon'        => '/img/default_images_while_migrations/categories/kids_book.png',
             'description' => 'Sve knjige koje su predviđene za uzrast od <b>7</b> do <b>16</b> godina.',
             'default'     => 'true'
            ],
        );

        Category::insert($data);
    }
}
