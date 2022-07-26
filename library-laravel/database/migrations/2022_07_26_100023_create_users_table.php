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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usertype_id');
            $table->string('name', 128);
            $table->string('JMBG', 14)->unique();
            $table->string('email')->unique();
            $table->string('username', 64)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 256);
            $table->string('photo', 256);
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('usertype_id')->references('id')->on('users_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
