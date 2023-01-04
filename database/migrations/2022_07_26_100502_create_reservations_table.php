<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('book_id');
            $table->unsignedBigInteger('reservationMadeFor_user_id');
            $table->unsignedBigInteger('reservationMadeBy_user_id');
            $table->unsignedBigInteger('closeReservation_user_id')->nullable();
            $table->unsignedBigInteger('closure_reason')->nullable();
            $table->date('request_date')->nullable();
            $table->date('reservation_date');
            $table->date('close_date')->nullable();

            $table->foreign('book_id')->references('id')->on('books')
                ->onDelete('cascade');
            $table->foreign('reservationMadeFor_user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('reservationMadeBy_user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('closeReservation_user_id')->references('id')
                ->on('users')->onDelete('cascade');
            $table->foreign('closure_reason')->references('id')
                ->on('cancellation_reasons')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
};
