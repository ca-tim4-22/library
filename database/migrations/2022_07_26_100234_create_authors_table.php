<?php

use Database\Seeders\AuthorSeeder;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
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
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('NameSurname', 128);
            $table->string('photo', 256)->default('placeholder');
            $table->string('biography', 1000);
            $table->string('wikipedia', 255);
            $table->timestamps();
        });

        $seeder = new AuthorSeeder();
        $seeder->run();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');
    }
};
