<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->string('icon', 256);
            $table->string('default', 256)->default('true');
            $table->string('description', 2048);
        });

        DB::table('categories')->insert([
            ['name' => 'Pravo', 'icon' => '/img/default_images_while_migrations/categories/law.png',  'description' => 'Pravo je ukupnost pravnih pravila, načela i instituta kojima se uređuju odnosi u određenoj društvenoj zajednici (pravo u objektivnom smislu).', 'default' => 'true'],
            ['name' => 'Nauka, priroda i matematika', 'icon' => '/img/default_images_while_migrations/categories/science.png',  'description' => 'Matematika je nauka koja izučava aksiomatski definisane apstraktne strukture koristeći matematičku logiku.', 'default' => 'true'],
            ['name' => 'Školske knjige', 'icon' => '/img/default_images_while_migrations/categories/school_books.png',  'description' => 'Sve knjige koje su predviđene za obrazovni program.', 'default' => 'true'],
            ['name' => 'Istorijske knjige', 'icon' => '/img/default_images_while_migrations/categories/history.png',  'description' => 'Sve knjige koje daju neke informacije ili dokaze o istoriji iz raznih oblasti.', 'default' => 'true'],
            ['name' => 'Dječije knjige', 'icon' => '/img/default_images_while_migrations/categories/kids_book.png',  'description' => 'Sve knjige koje su predviđene za uzrast od <b>7</b> do <b>16</b> godina.', 'default' => 'true'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
