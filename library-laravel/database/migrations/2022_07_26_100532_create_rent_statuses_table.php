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
        Schema::create('rent_statuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rent_id');
            $table->unsignedBigInteger('book_status_id');
            // $table->date('date');
            $table->timestamps();

            $table->foreign('rent_id')->references('id')->on('rents')->onDelete('cascade');
            $table->foreign('book_status_id')->references('id')->on('book_statuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rent_statuses');
    }
};
