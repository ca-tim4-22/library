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
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->string('icon', 256)->nullable();
            $table->string('default', 256)->default('false');
            $table->string('description', 2048)->nullable();
        });

        DB::table('genres')->insert([
            ['name' => 'Roman', 'icon' => 'roman.png',  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'default' => 'true'],
            ['name' => 'Pripovjetka', 'icon' => 'fairytale.png',  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'default' => 'true'],
            ['name' => 'Dramska poezija', 'icon' => 'poetry.png',  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'default' => 'true'],
            ['name' => 'Lirska poezija', 'icon' => 'lyrics.png',  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'default' => 'true'],
            ['name' => 'Stručna literatura', 'icon' => 'literature.png',  'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'default' => 'true'],
            ['name' => 'Epska poezija', 'icon' => 'epic.png', 'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.', 'default' => 'true'],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genres');
    }
};
