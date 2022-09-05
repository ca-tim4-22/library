<?php

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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title', 256);
            $table->integer('page_count');
            $table->unsignedBigInteger('letter_id');
            $table->unsignedBigInteger('language_id');
            $table->unsignedBigInteger('binding_id');
            $table->unsignedBigInteger('format_id');
            $table->unsignedBigInteger('publisher_id');
            $table->string('ISBN', 20)->unique();
            $table->integer('quantity_count');
            $table->integer('rented_count')->default(0);
            $table->integer('reserved_count')->default(0);
            $table->string('body', 4128);
            $table->string('year');
            
            $table->foreign('letter_id')->references('id')->on('letters')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->foreign('binding_id')->references('id')->on('bindings')->onDelete('cascade');
            $table->foreign('format_id')->references('id')->on('formats')->onDelete('cascade');
            $table->foreign('publisher_id')->references('id')->on('publishers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
};
