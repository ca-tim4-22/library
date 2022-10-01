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
            ['name' => 'Pravo', 'icon' => '/img/default_images_while_migrations/categories/law.png',  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'default' => 'true'],
            ['name' => 'Nauka, priroda i matematika', 'icon' => '/img/default_images_while_migrations/categories/science.png',  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'default' => 'true'],
            ['name' => 'Školske knjige', 'icon' => '/img/default_images_while_migrations/categories/school_books.png',  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'default' => 'true'],
            ['name' => 'Istorijske knjige', 'icon' => '/img/default_images_while_migrations/categories/history.png',  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'default' => 'true'],
            ['name' => 'Dječije knjige', 'icon' => '/img/default_images_while_migrations/categories/kids_book.png',  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'default' => 'true'],
            ['name' => 'Hrana i piće', 'icon' => '/img/default_images_while_migrations/categories/food_and_drink.png', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'default' => 'true'],
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
